<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'country' => 'required',
            'city' => 'required',
            'municipality' => 'required',
        ]);

        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'municipality_id' => $data['municipality'],
        ]);
    }

}
