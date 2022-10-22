<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('loginfunction','lecturerController@loginFunction');
Route::get('logoutfunction','lecturerController@logout');

Route::get('mainmenu/dashboard','dashboardController@dashboard');

Route::get('ajax/getSummary','dashboardController@getSummary');


Route::get('/connectioncheck','settings@TestConnection');
//Student
Route::get('/students/studentlist','studentController@studentlist');
Route::get('/students/studentdetails','studentController@studentDetail');
Route::any('/students/getattendancebyid','studentController@getAttendanceByID');


//Classes

Route::get('/classes/allclass','classController@allClass');
Route::get('/classes/classdetails','classController@classDetails');

//Lecturer/

Route::get('/lecturer/lecturerlist','lecturerController@lecturerList');
Route::any('/lecturer/lectureradd','lecturerController@lecturerAdd');
Route::any('/lecturer/lectureredit','lecturerController@lecturerEdit');
Route::any('/lecturer/lecturerdelete','lecturerController@lecturerDelete');

//Email
Route::get('/email/dailyemail','emailController@dailyEmail');
Route::get('/email/lecturer','emailController@lecturerEmail');
Route::get('/email/powerschool','emailController@powerschoolsubmit');



