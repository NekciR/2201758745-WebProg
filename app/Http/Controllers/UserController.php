<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewProfile(){
        return view('profile');
    }

    public function putProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric'
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success','Profile Updated!');
    }

    public function manageUser(){
        $users = User::where('Role','User')->get();
        return view('manage_user',['users' => $users]);
    }

    public function deleteUser($id){
        User::destroy($id);
        return back()->with('success', 'User deleted!');
    }
}
