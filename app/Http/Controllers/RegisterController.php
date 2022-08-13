<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * @OA\Get(
     *     path="/register",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'password' =>['required', 'min:6', 'confirmed']
        // ]);

        $validation = Validator::make($request->all(), [
               'name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' =>['required', 'min:6', 'confirmed']
        ]);

        if($validation->fails()) :
            return response()->json([
                'status' => false,
                'message' => $validation->errors()
            ],404);
        endif;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'status' => true,
            'message' => 'You have successfully registered, Please Login!',
          ]);
    }
}
