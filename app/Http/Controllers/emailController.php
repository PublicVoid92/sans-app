<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;
use App\Jobs\dailyEmailQueue;
use App\Jobs\lecturerEmailQueue;


class emailController extends Controller
{
    


    public function dailyEmail(){
        try {
            $db_model =  new db_model;

            $email_list = $db_model->getDailyEmailData();

            $primary_email = array();
            $secondary_email = array();


            $email_array = array();
            foreach ($email_list as $key => $value) {
             

               if ($value->value) {
                   foreach (json_decode($value->value) as $k => $v) {
                        if($k == 9){
                            $primary_email[] = $v;
                        }
                        //cc-carbon copy
                        if ($k == 10 || $k == 11) {
                            $secondary_email[] = $v;
                        }
                   }
               }

               dispatch(new dailyEmailQueue($value->empid,$value->first_name.' '.$value->last_name,$value->punch_datettime,$value->punch_state,$primary_email,$secondary_email));

               $primary_email = array();
               $secondary_email = array();
            }

        } catch (Exception $e) {
            
        }
    }



    public function lecturerEmail(){
        try {
            

            $db_model = new db_model;

            $lecturer_class = $db_model->getClassLecturer();

            $lecturer_data = array();
            $class_array = array();
            $student_data = array();

            foreach ($lecturer_class as $key => $value) {
                
               $class_array[] = $value->id;
               $lecturer_data[$value->id] = array(
                                                    'id'=>$value->id,
                                                    'firstname'=>$value->firstname,
                                                    'fullname'=>$value->fullname,
                                                    'email'=>$value->email,
                                                    'class_name'=>$value->position_name




                                        );

            }

           

            $student_data = $db_model->getAllClassByArray($class_array);
            $attendance_data = $db_model->getTodayAttendance();
            $attendance_array = array();


            foreach ($attendance_data as $key => $value) {
                $attendance_array[$value->emp_id] = $value->punch_time;
            }

            // get all class function
            // get all today attendance function

            //Cross check studentid[attendance] and categorize

            $student_array = array();
            // 
            foreach ($lecturer_data as $key => $value) {
                

                foreach ($student_data as $k => $v) {

                    if ($v->position_id == $key) {

                        $a_status = '';
                        if (isset($attendance_array[$v->id])) {
                            if (date("H:i", strtotime($attendance_array[$v->id])) <= '09:00') {
                                $a_status = ' Present ';
                            }else{
                                $a_status = 'Tardy';
                            }
                        }else{
                            $a_status = ' Absent ';
                        }

                       $student_array[$key][] = array(
                                                                    'firstname'=>$v->first_name,
                                                                    'lastname'=>$v->last_name,
                                                                    'attendance_status'=>$a_status



                                                        );
                    }
                    
                }

                // run job to send email
                dispatch(new lecturerEmailQueue($value['email'],$value['id'],$value['class_name'],$value['firstname'],$value['fullname'],$student_array));

                 $student_array = array();
            }

            // ------------------------------------------------------------
        


           
        } catch (Exception $e) {
            
        }
    }
}
