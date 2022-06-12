<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;
use App\Models\setting_model;

class studentController extends Controller
{
    public function studentlist(){
        try {
            $db_model = new db_model;

            $data = $db_model->getStudentList();

       

            return view('student_list',array('data'=>$data));


        } catch (Exception $e) {
            
        }
    }


    public function studentDetail(Request $request){
        try {

            $input = $request->all();
            $db_model = new db_model;
            $setting_model = new setting_model;

            $data = $db_model->getSingleStudentDetail($input['id']);
            //Custom field

            $cf = $setting_model->customFieldList();

            $ei =  $db_model->getCustomFieldByStudentID($input['id']);

            $extra_info = array();
            foreach(json_decode($ei->value) as $k=>$v){

                $extra_info[$k]=$v;
            }

            return view('student_detail',array(
                                                'data'=>$data,
                                                'cf'=>$cf,
                                                'extra_info'=>$extra_info



                                            ));
        } catch (Exception $e) {
            
        }
    }
}
