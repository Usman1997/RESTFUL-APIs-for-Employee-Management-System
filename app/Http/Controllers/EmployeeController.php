<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Designation;
use DB;
class EmployeeController extends Controller
{
   public function getAllEmployee(){
 
    $employee = Employee::all();
    $response = [
      'employee' => $employee,
    ];
    return response()->json($response,200);

   }

   public function AddEmployee(Request $request){
       $employee = new Employee();
       $employee->name = $request->input('name');
       $employee->email = $request->input('email');
       $employee->address = $request->input('address');
       $employee->designation_id = $request->input('designation_id');
       $employee->salary = $request->input('salary');
       $employee->password = bcrypt($request->input('password'));
       $employee->p_number = $request->input('p_number');
       $employee->gender = $request->input('gender');
       $employee->no_of_leaves = $request->input('no_of_leaves');
      
        $employee->save();
        return response()->json(['employee'=>$employee,'message'=>'success'],201);

   }

   public function EditEmployee(Request $request,$id){
       $employee = Employee::find($id);
       if(!$employee){
        return response()->json(['message'=>'Employee not found'],404);
       }

       $employee->name = $request->input('name');
       $employee->email = $request->input('email');
       $employee->address = $request->input('address');
       $employee->designation_id = $request->input('designation_id');
      $employee->salary = $request->input('salary');
       $employee->password = bcrypt($request->input('password'));
       $employee->p_number = $request->input('p_number');
       $employee->gender = $request->input('gender');
       $employee->no_of_leaves = $request->input('no_of_leaves');
      
        $employee->save();
        return response()->json(['employee'=>$employee,'message'=>'success'],201);


   }
   public function DeleteEmployee(Request $request,$id){
          $employee = Employee::find($id);
          if(!$employee){
            return response()->json(['message'=>'Employee not found'],404);  
          }
          $employee->delete();
          return response()->json(['message'=>'success'],200);
   }

   public function getDeptEmployee($id){
    $designation_id = Designation::select('id')->where('dept_id',$id)->get();
   $employee = DB::table('employees')->whereIn('designation_id',$designation_id->toArray())->get();
  
    $response = [
      'employee' => $employee,
     
    ];
    return response()->json($response,200);
   }
}
