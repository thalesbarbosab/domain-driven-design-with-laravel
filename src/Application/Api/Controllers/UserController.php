<?php

namespace App\Application\Api\Controllers;

use App\Infrastructure\Laravel\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
}


