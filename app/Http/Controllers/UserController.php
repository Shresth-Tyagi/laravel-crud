<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(Request $request){
        $data = user::all();
        return view('index', ['data' => $data]);
      
    }
    function add(Request $request){
       
        return view('add');
      
    }
    function store(Request $request){
       
     $validatedData = $request->validate([
     'name' => 'required',
     'email' => 'required|email',
     'phone_number' => 'required',
     ]);
      
     $user = new user;
     $user->name = $request->name;
     $user->email = $request->email;
     $user->phone_number = $request->phone_number;
     $user->save();

     session()->flash('success','User added successfully.');
     return redirect()->route('index');
    

    }
    
    function edit($id){
        $id = base64_decode($id);
        $Data = User::findorfail($id);
        
        return view('edit',compact('Data'));

    }

    function update(Request $request,$id){
       
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        ]);
        $Data = User::findorfail(base64_decode($id));
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->phone_number = $request->phone_number;
        $Data->save();
    
        session()->flash('success','User Updated successfully.');
        return redirect()->route('index');
    }

    function delete($id){
        User::where('id',base64_decode($id))->delete();
        session()->flash('success','User Deleted successfully.');
        return redirect()->route('index');
    }

}
