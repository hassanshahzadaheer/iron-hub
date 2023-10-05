<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'member')->get(); // Assuming 'members' are users with 'member' role

        return view('admin.members.index', ['members' => $members]);
    }
    public function create()
    {
        return view('admin.members.create');
    }
    public function store(Request $request)
    {
        dd("I'm in store function");
        // Validate the form data (add validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            // Add validation rules for other member fields
        ]);

        // Create a new member with the validated data
        $member = new User();
        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        // Set other member attributes here
        $member->save();

        // Redirect to the member listing page or a success page
        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }
}
