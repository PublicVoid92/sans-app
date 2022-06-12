<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;

class settings extends Controller
{
    //

    public function TestConnection(){
        try {
            $db_model = new db_model;

            $data = $db_model->testConnection();

       

            return view('student_list',array('data'=>$data));


        } catch (Exception $e) {
            
        }
    }
}
