<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\EmployeeLeave;
use App\Employee;
class LeaveController extends Controller
{
    public function addLeave(Request $request){
 
         $leave = new Leave();
         $leave->type = $requset->input('type');
         $leave->save();
         return response()->json(['message'=>'success'],201);
    }

    public function getLeave(){
        $leave = Leave::all();
        $response = [
         
         'leave' => $leave,
        ];
        return response()->json($response,200);
    }

    public function editLeave(Request $request,$id){
        $leave = Leave::find($id);
        if(!$leave){
            return response()->json(['message'=>'leave not found'],404);
        }
   
        $leave->type = $request->input('type');
       
        $leave->save();
        return response()->json(['leave'=>$leave,'message'=>'success'],200);
    }


    public function deleteleave(Request $request,$id){
        $leave = Leave::find($id);
        if(!$leave){
            return response()->json(['message'=>'leave not found'],404);
        }
        $leave->delete();
 
        
            return response()->json(['message'=>'success'],200);
        
    }
    public function assignLeave(Request $request){
        $leave = new EmployeeLeave();
        $leave->employee_id = $request->input('employee_id');
        $leave->no_of_days = $request->input('no_of_days');
        //calculate the number of leaves
        $id = $leave->employee_id;
        $employee =  Employee::all()->where('id',$id)->first();
        $emp_leave = $employee->no_of_leaves;
        $rem_leave = $emp_leave - $leave->no_of_days;
        if($rem_leave <=0){
            return response()->json(['message'=>'Not enough leaves'],401);
        }else{
            
            $leave->leave_type_id = $request->input('leave_type_id');
          
            $leave->from_date = $request->input('from_date');
            $leave->save();
     
            
            $employee->no_of_leaves = $rem_leave;
            $employee->save();
    
            return response()->json(['message'=>'success',$rem_leave],201);
        }
        
    }
}
