<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class userCreate
{
    public function create(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    }
}
