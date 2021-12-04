<?php

namespace App\Http\Controllers\Auth\V01;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\userCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    // register new user

    public function register(Request $request)
    {
        // validate user form for auth
        $valdate = $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:users','email'],
            'password' => ['required']
        ]);

        resolve(userCreate::class)->create($request);

        return response()->json([
            'message' => 'user created successfuly'
        ],201);

    }

    public function login(Request $request)
    {
        //validate for login user
        $valdate = $request->validate([
            'email' => ['required','unique:users','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($request->only(['email','password'])))
        {
            return response()->json(Auth::user(),200);
        }else{
            throw ValidationException::withMessages([
                'email' => 'incorrect email'
            ]);
        }


    }

    public function logout()
    {
        Auth::logout();
    }
}

