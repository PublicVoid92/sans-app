<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_model;
use App\Jobs\dailyEmailQueue;
use App\Jobs\lecturerEmailQueue;
use App\Jobs\powerschoolEmailQueue;
use Shuchkin\SimpleXLSXGen;


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

                        if (!empty($v)) {
                             if($k == 7){
                            $primary_email[] = $v;
                            }
                            //cc-carbon copy
                            if ($k == 8 || $k == 9) {
                                $secondary_email[] = $v;
                            }
                        }
                       
                    }
                }

                dispatch(new dailyEmailQueue($value->empid,$value->first_name.' '.$value->last_name,$value->punch_datetime,$value->punch_state,$primary_email,$secondary_email));

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
            $check = array();

            $no = 0;
            foreach ($lecturer_data as $key => $value) {

                $check[$key] = $no;

                foreach ($student_data as $k => $v) {

                    if ($v->position_id == $key) {

                        $a_status = '';

                        if (isset($attendance_array[$v->id])) {

                       

                            // echo $attendance_array[$v->id].'<br>';
                            if (date_format(date_create($attendance_array[$v->id]),"H:i") <= '08:10') {
                                $a_status = 'Present';
                            }else{
                                $a_status = 'Tardy';
                            }
                        }else{
                            $a_status = 'Absent';
                        }
                        //check class attendance
                        if ($a_status == 'Present' || $a_status == 'Tardy') {
                            // $check[$key] = array($a_status);
                            $no = $no +1;
                            $check[$key] = $no;
                        }

                        $student_array[$key][] = array(
                            'id'=>$v->emp_code,
                            'firstname'=>$v->first_name,
                            'lastname'=>$v->last_name,
                            'attendance_status'=>$a_status

                        );
                    }

                }

                // echo $check[$key];
                // run job to send email
                if ($check[$key] != 0) {
                    dispatch(new lecturerEmailQueue($value['email'],$value['id'],$value['class_name'],$value['firstname'],$value['fullname'],$student_array));
                }

                // print_r($student_array);

                $no = 0;
                $check = array();
                $student_array = array();
            }

            // ------------------------------------------------------------




        } catch (Exception $e) {

        }
    }


    public function powerschoolsubmit(){


        // select today attendabce

        $studentlist = db_model::powerschoolfunction();

        $books = [
            ['ISBN', 'title', 'author', 'publisher', 'ctry' ],
            [618260307, 'The Hobbit', 'J. R. R. Tolkien', 'Houghton Mifflin', 'USA'],
            [908606664, 'Slinky Malinki', 'Lynley Dodd', 'Mallinson Rendel', 'NZ']
        ];

        $attendance_excel_creator[] = ['Student Name','Student No','Grade','Attendance'];


        foreach ($studentlist as $key => $value) {

     
            if (!empty($value->punch_time2)) {
                 
                  if ($value->punch_time2 <= '08:10:00') {
                        $status = 'P';
                  }else{

                    $status = 'T';
                  }
            }else{

                $status = 'A';
            }
            $attendance_excel_creator[] = [

                                                
                                                    $value->first_name.' '.$value->last_name,
                                                    $value->emp_code,
                                                    $value->position_name,
                                                    $status
                                                

                                        ];


                                          


         
        }
  

        // $SimpleXLSXGen = new SimpleXLSXGen;

        $xlsx = SimpleXLSXGen::fromArray( $attendance_excel_creator );
        $xlsx->saveAs('storage/powerschool_attendance/'.date('dmy').'.xlsx');

        // send to rotimi

         dispatch(new powerschoolEmailQueue());
    }
}
