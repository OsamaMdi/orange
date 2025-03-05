<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return response()->json([
            'status' => true,
            'message'=> 'All Users',
            'data'=> $data,
            ]);
    }
    public function show(Request $request, $id){
        $data = User::find($id);
        return response()->json([
            'status'=> true,
            'message'=> 'User For id:' . $id,
            'data'=> $data,
        ]);
    }
    public function store(Request $request){


        $data = $request->validate([
            "name"=> "required|string|max:2550",
            'email' => 'required|email|max:255|unique:users,email',
            "password"=> "required|string|min:5|max:16",
        ]);
        $data = User::create($data);
        return response()->json([

            'status'=> true,
            'message'=> 'User Created',
            'data'=> $data,
        ],);
    }
    public function update(Request $request, $id){

    $validatedData  = $request->validate([
        "name"=> "required|string|max:2550",
        'email' => 'required|email|max:255|unique:users,email',
        "password"=> "required|string|min:5|max:16",
    ]);

    $data = User::find($id);
    if(!$data){
        return response()->json([
            "status"=> false,
            "message"=> "User Not Found"
        ],404);
    }
         $data->update($validatedData);
         return response()->json([
        "status"=> true,
        "message"=> "User updated successfully",
        'data' => $data,

         ],200);
    }
}
