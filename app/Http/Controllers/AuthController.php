<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Create User
    public function CreateRegister(Request $request){
        // dd($request);
        $user= new User();
        $user->first_name = $request->Fname;
        $user->email = $request->Email;
        $user->password = Hash::make($request->Password);
        $user->save();
        return response()->json(['success' => true]);
    }

    public function LoginForm(){
        return view('Auth.Login');
    }

    //Loggin
    public function LoggedIn(Request $request) {
    
            $validated = $request->validate([
                'password' => 'required',
                'email' => 'required',
            ],[
                
                'password.required' => 'Password is a required field.',
                'email.required' => 'Email is a required field.',
            ]);
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (Auth::attempt($credentials)) {
                return redirect('/Dashboard')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Email or Password not valid');
            }
    }

    //Logout
    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); //check user got completely logout
        $request->session()->regenerateToken();// create token for security 
        return redirect()->route('RegisterForm')->with('success', true);
    }
      
}
