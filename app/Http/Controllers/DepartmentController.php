<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class DepartmentController extends Controller
{
public function newDept(Request $request){
  $dept = new Department();
  $dept->name = $request->input('name');
  $dept->save();
  return response()->json(['department'=>$dept,'message'=>'success'],201);
}

public function editDept(Request $request,$id){

     $dept = Department::find($id);
     if(!$dept){
         return response()->json(['message'=>'Department not found'],404);
     }

     $dept->name = $request->input('name');
     $dept->save();
     return response()->json(['department'=>$dept,'message'=>'success'],200);
     
}

public function deleteDept(Request $request,$id){
    $dept = Department::find($id);
    if(!$dept){
        return response()->json(['message'=>'Department not found'],404);
    }
    $dept->delete();
    $dept = Department::find($id);
    
        return response()->json(['message'=>'success'],200);
    


}

public function getDept(){
  $dept = Department::all();
// $dept = Department::find(1)->designations()->get();
  $response = [
      'department' => $dept
  ];
  return response()->json($response,200);
}
}
