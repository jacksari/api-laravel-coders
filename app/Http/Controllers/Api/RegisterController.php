<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = User::create($request->all());
        return response($user, 200);
    }
}
