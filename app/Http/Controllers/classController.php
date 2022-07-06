<?php

namespace App\Http\Controllers;
use App\Models\setting_model;
use App\Models\db_model;
use Illuminate\Http\Request;

class classController extends Controller
{
    public function allClass(){
        try {

        	$setting_model = new setting_model;

        	$data =  $setting_model->getClassData();


            return view('allclass',array('data'=>$data));
        } catch (Exception $e) {


            
        }
    }



    public function classDetails(Request $request){

    	$input = $request->all();

    	$db_model = new db_model;
    	$setting_model = new setting_model;

    	$class_data = $setting_model->getClassByID($input['id']);
    	$student_data = $db_model->getStudentByClassID($input['id']);


        $getattendance = $db_model->getAttendanceByMonth($input['id']);


        $getattendance_array = array();

        foreach ($getattendance as $key => $value) {
           $getattendance_array[$value->id][date_format(date_create($value->punch_time),"n")] = $value->punch_time; 
        }


    	return view('class_details',array('class_data'=>$class_data,'student_data'=>$student_data,'getattendance_array'=>$getattendance_array));
    }
}
