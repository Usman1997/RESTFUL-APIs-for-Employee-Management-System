<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
class DesignationController extends Controller
{
    public function getDesignation($id){
  
          $designation = Designation::all()->where('dept_id',$id);
          if(!$designation){
              return response()->json(['message'=>'No Designation'],404);
          }
          $response = [
            'designation' => $designation,
          
          ];
          return response()->json($response,200);

    }

    public function editDesignation(Request $request,$id){
        $designation = Designation::find($id);
        if(!$designation){
            return response()->json(['message'=>'Designation not found'],404);
        }
   
        $designation->name = $request->input('name');
        $designation->dept_id = $request->input('dept_id');
        $designation->save();
        return response()->json(['designation'=>$designation,'message'=>'success'],200);
    }


    public function deleteDesignation(Request $request,$id){
        $designation = esignation::find($id);
        if(!$designation){
            return response()->json(['message'=>'Designation not found'],404);
        }
        $designation->delete();
 
        
            return response()->json(['message'=>'success'],200);
        
    }

    public function addDesignation(Request $request){
        $designation = new Designation();
        $designation->name = $request->input('name');
        $designation->dept_id = $request->input('dept_id');
        $designation->save();
        return response()->json(['designation'=>$designation,'message'=>'success'],201);
    }
}
