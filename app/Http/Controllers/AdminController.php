<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function pages()
    {
        return view('admin.content.pages');
    }

    public function events()
    {
        return view('admin.content.events');
    }

    public function users()
    {
        return view('admin.content.users');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function editor()
    {
        return view('admin.content.editor');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function authenticate()
    {
        // Simulation: Redirect to dashboard
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        return redirect()->route('admin.login');
    }
}
