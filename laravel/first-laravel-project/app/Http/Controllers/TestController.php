<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $test = Test::all();
        return view('test.index',compact('test'));
    }
    public function store(Request $request){
    

        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

         Test::create($request->all());
         redirect()->route('test.index')
         ->with('success','Post created successfully.');
   /*   $test = Test::create(
            [
                'name'=>$request->name,
                'description'=>$request->description
            ]);
            return redirect('main') ; */
    }
}