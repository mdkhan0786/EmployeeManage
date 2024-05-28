<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class DisplayController extends Controller
{
    public function ListDisplay(){
        $data=User::all();
        return view('index',['data' => $data]);
    }

    public function Delete(Request $request){
        $delete_id = $request->Delete;
        $record = User::find($delete_id);
        if($record){
            $record->delete();
            return response()->json(['status' => 'success', 'message' => 'Record deleted successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Record not found'], 404);
        }
    }
    
    
    
}
