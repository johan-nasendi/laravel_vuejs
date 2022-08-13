<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

     /**
     * @OA\Get(
     *     path="/login",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'status' => true,
                'message' => 'Congratulations, you have successfully logged in!',
                'Data' => Auth::user()
            ]);
        }
        throw ValidationException::withMessages([
            'email' =>['The provided credentials are incorect.']
        ]);



    }
     /**
     * @OA\Get(
     *     path="/logout",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => true,
            'message' => 'Log out successfully!',
          ]);
    }
}
