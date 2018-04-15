<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
class VacancyController extends Controller
{
    public function addVacancy(Request $request){
 
        $Vacancy = new Vacancy();
        $Vacancy->title = $request->input('title');
        $Vacancy->description = $request->input('description');
        $Vacancy->designation_id = $request->input('designation_id');
        $Vacancy->department_id = $request->input('department_id');
        $Vacancy->no_of_vacancies = $request->input('no_of_vacancies');
        $Vacancy->save();
        return response()->json(['message'=>'success'],201);
   }

   public function getVacancy(){
       $Vacancy = Vacancy::all();
       $response = [
        
        'Vacancy' => $Vacancy,
       ];
       return response()->json($response,200);
   }

   public function editVacancy(Request $request,$id){
       $Vacancy = Vacancy::find($id);
       if(!$Vacancy){
           return response()->json(['message'=>'Vacancy not found'],404);
       }
  
       $Vacancy->title = $request->input('title');
       $Vacancy->description = $request->input('description');
       $Vacancy->designation_id = $request->input('designation_id');
       $Vacancy->department_id = $request->input('department_id');
       $Vacancy->no_of_vacancies = $request->input('no_of_vacancies');
     
      
       $Vacancy->save();
       return response()->json(['Vacancy'=>$Vacancy,'message'=>'success'],200);
   }


   public function deleteVacancy(Request $request,$id){
       $Vacancy = Vacancy::find($id);
       if(!$Vacancy){
           return response()->json(['message'=>'Vacancy not found'],404);
       }
       $Vacancy->delete();

       
           return response()->json(['message'=>'success'],200);
       
   }
}
