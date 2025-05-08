<?php

//namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Models\User;

//class UserController extends Controller
//{
   // public function addUser(Request $request)
   // {
   //     $user = new User();
   //     $user->name = $request->name;
   //     $user->email = $request->email;
   //     $user->phone = $request->phone;
   //     $user->save();

  //      return response()->json(['message' => 'User added successfully']);
   // }
//}

//<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    } // End Method 
}
 
 

