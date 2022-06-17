<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;
use App\Models\setting_model;
use App\Models\lecturer_model;

class dashboardController extends Controller
{
    public function dashboard(){

        $db_model = new db_model;
        $setting_model = new setting_model;
        $lecturer_model = new lecturer_model;

        $student_count = $db_model->getStudentCount();


        $male_count = $db_model->getMaleCount();
        $female_count = $db_model->getFemaleCount();
        $grade_count =  $setting_model->getClassCount();
        $lecturer_count = $lecturer_model->getLecturerCount();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     


        print_r($student_count);


        return view('dashboard',array(  'student_count'=>$student_count,
                                        'male_count'=>$male_count,
                                        'female_count'=>$female_count,
                                        'grade_count'=>$grade_count,
                                        'lecturer_count'=>$lecturer_count




                                            ));
    }
}
