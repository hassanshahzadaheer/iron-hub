<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;


class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->get();
        return view('admin.members.index', ['members' => $members]);
    }
    public function create()
    {
        return view('admin.members.create');
    }
    public function store(Request $request)
    {


        try {
            \Log::info('Incoming request data:', ['data' => $request->all()]);


$base64ImageRule = [
            'required',
            function ($attribute, $value, $fail) {
                $data = explode(',', $value);

                if (count($data) !== 2 || !preg_match('/^data:image\/(\w+);base64/', $data[0])) {
                    $fail($attribute . ' is not a valid base64-encoded image.');
                }

                $imageData = base64_decode($data[1]);

                if ($imageData === false || !getimagesizefromstring($imageData)) {
                    $fail($attribute . ' is not a valid base64-encoded image.');
                }
            },
        ];


            // Validate the form data
            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|string|max:20',
                // 'street_address' => 'required|string|max:255',
                // 'city' => 'required|string|max:255',
                // 'dob' => 'required|date',
                'gender' => 'required|in:male,female,other',
              'captured_image' => ['required', $base64ImageRule],
            ]);
\Log::info('Validated data:', ['data' => $validatedData]);

            // Create a new user
            $user = new User();
            $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt('password');
            $user->role = 'member';
            $user->save();

            // Create a new member associated with the user
            $member = new Member();
            $member->user_id = $user->id;
            $member->fill($validatedData + ['last_name' => $validatedData['last_name'] ?? null]);
            $member->save();


// Handle base64-encoded image
if ($request->has('captured_image')) {
    $base64Image = $validatedData['captured_image'];
    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

    // Save the image to storage
    $imageName = 'captured_image_' . time() . '.png'; // You can use a different extension if needed
    Storage::disk('public')->put('profile_pictures/' . $imageName, $imageData);

    // Update the member's profile picture field
    $member->profile_picture = 'profile_pictures/' . $imageName;
    $member->save();
}



            // Redirect to the member listing page with success message
            // return redirect()->route('members.index')->with('success', 'Member created successfully');

return response()->json(['message' => 'Member created successfully']);

        } catch (\Exception $e) {
            // Redirect back with an error message

\Log::error('Error creating member: ' . $e->getMessage());
return response()->json(['error' => 'Error creating member. Please try again.'], 500);


            // return redirect()->back()->withInput()->with('error', 'Error creating member. Please try again.');
        }
    }
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id); // Find the user by ID
            $member = $user->member; // Get the associated member

            // Check if the user has an associated member
            if (!$member) {
                // Flash an error message and redirect back or wherever is appropriate
                return redirect()->back()->with('error', 'Member not found for the specified user.');
            }

            return view('admin.members.edit', compact('member'));
        } catch (ModelNotFoundException $e) {
            // Flash an error message and redirect back or wherever is appropriate
            return redirect()->back()->with('error', 'User not found with the specified ID.' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the member by ID with the 'user' relationship eager loaded
        $member = Member::with('user')->findOrFail($id);

        // Update the user associated with the member
        $user = $member->user;
        $user->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->save();

        // Update the member's attributes with the validated data
        $member->fill($validatedData);

        // Handle file upload for profile picture
        if ($request->hasFile('profile_picture')) {
            $member->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Save the changes
        $member->save();

        // Redirect to the member listing page with success message
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }


    public function destroy($id)
    {

        // Find the member by ID
        $member = User::findOrFail($id);

        // Delete the member
        $member->delete();

        // Redirect to the member listing page or a success page
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
