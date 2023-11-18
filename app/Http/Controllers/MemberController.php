<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            // Validate the form data

            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                 'last_name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|string|max:20',
            // 'street_address' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

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

            // Handle file upload for profile picture
            if ($request->hasFile('profile_picture')) {
                $member->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
                $member->save();
            }

            // Debugging information
            \Log::info('Member created successfully.', ['user_id' => $member->user_id]);

            // Redirect to the member listing page with success message
            return redirect()->route('members.index')->with('success', 'Member created successfully');
        } catch (\Exception $e) {

\Log::error('Error creating member.', ['error' => $e->getMessage()]);


// Redirect back with an error message
return redirect()->back()->withInput()->with('error', 'Error creating member. Please try again.');


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
