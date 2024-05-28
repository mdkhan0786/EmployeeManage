<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;

class EmployeeController extends Controller
{
   public function EmployeeFun()
   {
    $Employee=EmployeeModel::all();

    return view('Employee.index',compact('Employee'));
   }

   public function CreateEmp(Request $request){
    $Emp=new EmployeeModel();
    $Emp->Employee_Name = $request->EmpName;
    $Emp->Employee_Code = $request->EmpName;
    $Emp->Employee_Email = $request->EmpEmail;
    $Emp->Designation = $request->EmpDesignation;
    $Emp->save();
    return response()->json(['success' => true]);
    
   }

   public function testupdate(Request $request){

      $EmployeeId = $request->EmpId;
      $Employee=EmployeeModel::find($EmployeeId);
      $Employee->Employee_Name = $request->EmpName;
      $Employee->Employee_Email = $request->EmpEmail;
      $Employee->Designation = $request->EmpDesi;
  
      $Employee->save();
      return response()->json(['success' => true]);
      
   }
}




