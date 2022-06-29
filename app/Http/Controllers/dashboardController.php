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



        $studentByLevel =  $db_model->getStudentCountByLevel();


        $early_year = array();
        $elementary = array();
        $jhs = array();
        $hs = array();


        foreach ($studentByLevel as $key => $value) {
            $str = substr($value->position_name, 0, 2);

            if (is_numeric($str)) {
                if ($str == '1' || $str == '2' || $str == '3' || $str =='4') {
                    //elementary
                    $elementary[] = array(

                                            'class_name' => $value->position_name,
                                            'count'=>$value->count

                                        );
                }

                if ($str == '6' || $str == '7' || $str == '8') {
                    //junior high school

                    $jhs[] = array(

                                            'class_name' => $value->position_name,
                                            'count'=>$value->count

                                        );
                }

                if($str == '9' || $str == '10' || $str == '11' || $str == '12'){
                    // high school

                    $hs[] = array(

                                            'class_name' => $value->position_name,
                                            'count'=>$value->count

                                        );
                }
            }else{
                // early year

                $early_year[] = array(

                                            'class_name' => $value->position_name,
                                            'count'=>$value->count

                                        );

            }
        }


        print_r($early_year);


        
        return view('dashboard',array(  'student_count'=>$student_count,
                                        'male_count'=>$male_count,
                                        'female_count'=>$female_count,
                                        'grade_count'=>$grade_count,
                                        'lecturer_count'=>$lecturer_count,
                                        'early_year'=>$early_year,
                                        'elementary'=>$elementary,
                                        'jhs'=>$jhs,
                                        'hs'=>$hs




                                            ));
    }
}
