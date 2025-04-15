<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor to apply the 'admin' role middleware (if needed)
    public function __construct()
    {
        //$this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    // Add any other methods specific to the admin role
    public function manageUsers()
    {
        // Logic for managing users
        return view('admin.manage-users');
    }
}

