<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','desc')->get();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload($id,Request $request)
    {
      $user = User::find($id);
      $imageName = time().'.'.$request->photo->extension();

      $path = public_path('images');

      if(!empty($user->photo) && file_exists($path.'/'.$user->photo)) :
        unlink($path.'/'.$user->photo);
      endif;

      $user->photo = $imageName;
      $user->save();

      $request->photo->move(public_path('images'), $imageName);
      return response()->json([
        'status' => true,
        'message' => 'Uploaded Successfully!',
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|string|min:6'
        // ]);

        $validation = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|string|min:6'
        ]);
        if($validation->fails()) :
            return response()->json([
                "status" => false,
                'message' => $validation->errors(),
            ],404);
        endif;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Data successfully saved',
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
       ]);
    //    if($validation->fails()) :
    //        return response()->json([
    //            "status" => false,
    //            'message' => $validation->errors(),
    //        ],404);
    //    endif;

        User::where('id',$id)->update(
            [
                'name' => $request->name,
                'email' => $request->email
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Data successfully updated',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data successfully removed',
        ]);
    }
}
