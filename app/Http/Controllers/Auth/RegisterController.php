<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|alpha|max:255',
            'lastname' => 'required|alpha|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[@$!%*#?&+-]/',
            'date_birth' => 'required|date_format:Y-m-d'
        ]);

        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_birth' =>$request->date_birth
        ]);
        $user->save();

        $result = [
            'success' => true, 
            'user' => $user->toArray()
        ];
        return response()->json($result, 200);
    }
}
