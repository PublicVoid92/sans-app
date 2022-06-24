<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class db_model extends Model
{
    use HasFactory;


    public function getStudentList(){
        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }

    public function getSingleStudentDetail($id){
        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->where('id',$id)->get()->first();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getStudentByClassID($classid){
        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->where('position_id',$classid)->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getStudentCount(){
        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->count();

            return $result;
        } catch (Exception $e) {
            
        }
    }

    public function getCustomFieldByStudentID($studentid){

        try {
            $result = DB::connection('pgsql')->table('personnel_employeeextrainfo')->where('employee_id',$studentid)->first();


            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getMaleCount(){

        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->where('gender','M')->count();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getFemaleCount(){

        try {
            $result = DB::connection('pgsql')->table('personnel_employee')->where('gender','F')->count();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getDailyEmailData(){
        try {
            $result = DB::connection('pgsql')->table('personnel_emailfunction as a')
                        ->select('a.empid','a.punch_datetime','a.punch_state','b.first_name','b.last_name','c.value')
                        ->join('personnel_employee as b','a.empid','=','b.id')
                        ->leftjoin('personnel_employeeextrainfo as c','a.empid','=','c.employee_id')
                        ->where('a.punch_datetime','LIKE','%'.date('Y-m-d').'%')
                        ->where('a.ep_status',0)
                        ->get()->toarray();


            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function update_dailyemail_error($empid){

        try {
            $update = DB::connection('pgsql')->table('personnel_emailfunction')->where('empid',$empid)->update(['error_txt'=>'sending email error']);

            return $update;
        } catch (Exception $e) {
            
        }
    }


    public function update_dailyemail_success($empid){

        try {
            $update = DB::connection('pgsql')->table('personnel_emailfunction')->where('empid',$empid)->update(['ep_status'=>1]);

            return $update;
        } catch (Exception $e) {
            
        }
    }


    public function getClassLecturer(){
        try {
            $data = DB::connection('pgsql')->table('personnel_position as a')->select('a.id','a.position_code','a.position_name','b.firstname','b.fullname','b.email')->join('personnel_lecturer as b','a.id','=','b.position_id')->get()->toarray();


            return $data;
        } catch (Exception $e) {
            
        }
    }


    public function getCLassAttendanceForTeacher($classArray){

        try {
             $result = DB::connection('pgsql')->table('personnel_employee as a')
                        ->select('a.first_name','a.last_name','b.punch_time','a.position_id')
                        ->leftjoin('iclock_transaction as b','a.id','=','b.emp_id')
                        ->wherein('a.position_id',$classArray)
                        // ->where('b.punch_time','LIKE','%'.date('Y-m-d').'%')
                        ->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getAllClassByArray($class_array){
        try {
            $result = DB::connection('pgsql')->table('personnel_employee')
            ->select('id','emp_code','first_name','last_name','position_id')
            ->wherein('position_id',$class_array)
            ->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }


    }


    public function getTodayAttendance(){
        try {
            $result = DB::connection('pgsql')->table('iclock_transaction')
            ->select('emp_id','punch_time')->where('punch_time','LIKE','%'.date('Y-m-d').'%')->get()->toarray();


            return $result;
        } catch (Exception $e) {
            
        }


    }

    // get all class function
    // get all today attendance function


}
