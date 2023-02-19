<?php

namespace App\Application\Website\Controllers;

use App\Infrastructure\Laravel\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $rand = rand();
        User::create([
            'name' => "Example {$rand}",
            'email' => "example_{$rand}@example.com",
            'password' => bcrypt("example_{$rand}@example.com")
        ]);
        return User::all();
    }
}


