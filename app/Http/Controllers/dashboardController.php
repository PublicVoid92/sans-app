<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;

class dashboardController extends Controller
{
    public function dashboard(){

        $db_model = new db_model;

        $student_count = $db_model->getStudentCount();


        print_r($student_count);


        return view('dashboard',array('student_count'=>$student_count));
    }
}
