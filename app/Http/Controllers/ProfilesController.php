<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $data = ['profileUser' => $user];

        if (request()->expectsJson()) {
            return $data;
        }

        return view('profiles.show', $data);    }
}
