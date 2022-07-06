<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lecturer_model;
use App\Models\setting_model;

class lecturerController extends Controller
{
    

    public function lecturerList(){
        try {
            $lecturer_model =  new lecturer_model;
            $setting_model = new setting_model;

            $lecturer_data = $lecturer_model->getAllLecturer();

            $classData = $setting_model->getAllClass();

            return view('lecturerlist',array('lecturer_data'=>$lecturer_data,'classData'=>$classData));
        } catch (Exception $e) {
            
        }
    }

    public function lecturerAdd(Request $request){
        try {
            $input = $request->input();
            $lecturer_model = new lecturer_model;

            $status = $lecturer_model->lecturerAdd($input);


            return $status;
        } catch (Exception $e) {
            
        }
    }


    public function lecturerEdit(Request $request){
        try {
            $input = $request->input();
            $lecturer_model = new lecturer_model;

            $status = $lecturer_model->lecturerEdit($input);

            return $status;
        } catch (Exception $e) {
            
        }
    }

    public function lecturerDelete(Request $request){
        try {
            $input = $request->input();
            $lecturer_model = new lecturer_model;



            $status = $lecturer_model->lecturerDelete($input);

            return $status;

        } catch (Exception $e) {
            
        }

    }



    public function loginFunction(Request $request){
        try {
            $input = $request->input();

            $lecturer_model = new lecturer_model();

            $status = $lecturer_model->loginFunction($input);

            if ($status != 0) {
                $session_data = $lecturer_model->getLecturerById($status);
                $request->session()->put('id', $session_data->id);
                $request->session()->put('firstname', $session_data->firstname);

                $status = 1;
            }

            return $status;


        } catch (Exception $e) {
            
        }
    }



    public function logout(Request $request){
        try {
            $request->session()->flush();

            return redirect('/');
        } catch (Exception $e) {
            
        }
    }
}
