<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return response()->json(['status' => 'success', 'token' => $token]);
        }else
            return response()->json(['status' => 'error', 'token'  => 'wrong credentials']);
    }

    public function logout()
    {
        auth()->user()->token()->revoke();
        return response()->json(['status' => 'logged out']);
    }
}
