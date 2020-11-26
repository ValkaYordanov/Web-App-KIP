<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('userAuthentication.profile', compact('user'));
    }

    public function updateProfile()
    {

    }
}
