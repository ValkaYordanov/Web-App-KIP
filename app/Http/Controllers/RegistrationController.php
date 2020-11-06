<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationPostRequest;
use App\Models\User;

class RegistrationController extends Controller
{

    public function add()
    {
        return view('userAuthentication.registration');
    }
    public function create(RegistrationPostRequest $request)
    {
        $users = User::all();

        foreach ($users as $userObject) {
            if ($userObject->email == $request->input('email')) {
                return redirect()->back()->withInput()->withError('emailErr', "This Email is already in use!");

            }
        }

        $user = User::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'type' => 'normal',
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'street' => $request->input('street'),
            'strNumber' => $request->input('strNumber'),
            'remember_token' => 0,

        ]);

        return redirect(route('home'));

    }

}
