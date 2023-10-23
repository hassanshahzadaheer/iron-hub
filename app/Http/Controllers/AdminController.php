<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {


        // Get the authenticated admin's name
        $adminName = Auth::user()->name;

        // Check the user's role
        if (auth()->user()->role === 'admin') {
            return view('admin.dashboard', compact('adminName'));
        } elseif (auth()->user()->role === 'staff') {
            return view('staff.dashboard');
        } else {
            return view('home');
        }
    }
}
