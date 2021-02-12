<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login');

    }

    public function viewSignUp(){
        return view('auth.signup');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if($request->input('loginAs') == 1){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'User'],$request->has('remember'))){
                return redirect('/');
            }else{
                return redirect()->back()->with('failed', 'User not found!');
            }
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin'],$request->has('remember'))){
                return redirect('/');
            }else{
                return redirect()->back()->with('failed', 'Admin not found!');
            }
        }


    }

    public function postSignUp(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|numeric'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => 'User'
        ]);

        return redirect('/login');
    }

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

    public function signout(){
        Auth::logout();
        return redirect('/');
    }
}
