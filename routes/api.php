<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/quote',[
  'uses' =>'QuoteController@postQuote',
  'middleware'=>'auth.jwt'
]);

Route::get('/quotes',[

 'uses'=>'QuoteController@getQuote',

]);

Route::put('/quote/{id}',[
    'uses'=>'QuoteController@putQuote',
    'middleware'=>'auth.jwt'
    ]);


Route::delete('/quote/{id}',[
    'uses'=>'QuoteController@deleteQuote',
    'middleware'=>'auth.jwt'
]);

Route::post('/user/signup',[

  'uses' => 'UserController@Signup'
]);

Route::post('/user/signin',[

 'uses' =>'UserController@SignIn'
]);
// Department Routes

Route::post('/department',[
'uses'=> 'DepartmentController@newDept',

]);

Route::put('/department/{id}',[
'uses' => 'DepartmentController@editDept',

]);

Route::delete('/department/{id}',[
    'uses' => 'DepartmentController@deleteDept',
    
    ]);
Route::get('/departments',[
        'uses' => 'DepartmentController@getDept',
        
        ]);

//Employee
Route::get('/all_employee',[

  'uses' => 'EmployeeController@getAllEmployee',
]);

Route::get('/dept_employee/{id}',[

  'uses' => 'EmployeeController@getDeptEmployee',
]);


Route::post('/add_employee',[

    'uses' => 'EmployeeController@AddEmployee',
  ]);

 
  Route::put('/edit_employee/{id}',[
   'uses' => 'EmployeeController@EditEmployee'

  ]);

  Route::delete('/delete_employee/{id}',[
   'uses' => 'EmployeeController@DeleteEmployee'

  ]);

//Designation
  Route::get('/designation/{id}',[

 'uses'=>'DesignationController@getDesignation'
  ]);

  Route::post('/designation',[
'uses'=>'DesignationController@addDesignation'
  ]);

Route::put('/designation/{id}',[
     'uses' =>'DesignationController@editDesignation'
   
  ]);

  Route::delete('/designation/{id}',[
   'uses' => 'DesignationController@deleteDesignation'

  ]);

  //Leaves 
  Route::post('/leaves',[
  'uses' => 'LeaveController@addLeave'

  ]);

  Route::get('/leaves',[

    'uses' => 'LeaveController@getLeave'
  ]);
  Route::put('/leaves/{id}',[

    'uses' => 'LeaveController@editLeave'
  ]);
  Route::delete('/leaves/{id}',[

    'uses' => 'LeaveController@deleteLeave'
  ]);

  //Events

  Route::post('/events',[
    'uses' => 'EventController@addEvent'
  
    ]);
  
    Route::get('/events',[
  
      'uses' => 'EventController@getEvent'
    ]);
    Route::put('/events/{id}',[
  
      'uses' => 'EventController@editEvent'
    ]);
    Route::delete('/events/{id}',[
  
      'uses' => 'EventController@deleteEvent'
    ]);

    //Vacancy

    Route::post('/vacancy',[
      'uses' => 'VacancyController@addVacancy'
    
      ]);
    
      Route::get('/vacancy',[
    
        'uses' => 'VacancyController@getVacancy'
      ]);
      Route::put('/vacancy/{id}',[
    
        'uses' => 'VacancyController@editVacancy'
      ]);
      Route::delete('/vacancy/{id}',[
    
        'uses' => 'VacancyController@deleteVacancy'
      ]);

    Route::post('/assign_leave',[
    'uses'=> 'LeaveController@assignLeave'

    ]);