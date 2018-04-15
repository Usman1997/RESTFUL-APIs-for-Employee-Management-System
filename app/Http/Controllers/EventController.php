<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
    public function addEvent(Request $request){
 
        $Event = new Event();
        $Event->title = $request->input('title');
        $Event->description = $request->input('description');
        $Event->from_date = $request->input('from_date');
        $Event->to_date = $request->input('to_date');
        $Event->save();
        return response()->json(['message'=>'success'],201);
   }

   public function getEvent(){
       $Event = Event::all();
       $response = [
        
        'Event' => $Event,
       ];
       return response()->json($response,200);
   }

   public function editEvent(Request $request,$id){
       $Event = Event::find($id);
       if(!$Event){
           return response()->json(['message'=>'Event not found'],404);
       }
  
        $Event->title = $request->input('title');
        $Event->description = $request->input('description');
        $Event->from_date = $request->input('from_date');
        $Event->to_date = $request->input('to_date');
      
       $Event->save();
       return response()->json(['Event'=>$Event,'message'=>'success'],200);
   }


   public function deleteEvent(Request $request,$id){
       $Event = Event::find($id);
       if(!$Event){
           return response()->json(['message'=>'Event not found'],404);
       }
       $Event->delete();

       
           return response()->json(['message'=>'success'],200);
       
   }
}
