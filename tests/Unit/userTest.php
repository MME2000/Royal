<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class userTest extends TestCase
{
    public function test_user_create()
    {
        User::create([
            'name' => 'ali',
            'email' => 'test@gmail.com',
            'password' => 123
        ]);

    }
}
