<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function Dashboard(){
        $Data=User::all();
        return view('dashboard.dashboard',['Data' =>$Data]);
    }


    public function Update(Request $request){
        
        $updateId = $request->updateId;
        // dd($updateId);
        $user = User::find($updateId);
        $user->first_name = $request->name;
        dd($user);
        $user->email = $request->email;
        $user->save();
        return response()->json(['success' => 'User updated successfully']);
    }

    public function DeleteUser(Request $request){
        $id=$request->Deleteid;
        dd($id);
        $user= User::find($id);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}

