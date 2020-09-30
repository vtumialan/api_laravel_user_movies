<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard()->user();
            $user->generateToken();

            $result = [
                'success' => true, 
                'token' => $user->api_token
            ];
            return response()->json($result, 200);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request, $trans = 'auth.failed')
    {
        $errors = [
            'error' => trans($trans)
        ];
        return response()->json($errors, 422);
    }
}
