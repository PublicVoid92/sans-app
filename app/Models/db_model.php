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
            $result = DB::connection('pgsql')->table('personnel_emailfunction AS a')
                        ->select('a.empid','a.punch_datetime','a.punch_state','b.first_name','b.last_name','c.value')
                        ->join('personnel_employee AS b','a.empid','=','b.id')
                        ->leftjoin('personnel_employeeextrainfo AS c','a.empid','=','c.employee_id')
                        ->wheredate('a.punch_datetime',date('Y-m-d'))
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
            ->select('emp_id','punch_time')->where('punch_time','LIKE','%'.date('Y-m-d').'%')->where('punch_state',0)->get()->toarray();


            return $result;
        } catch (Exception $e) {
            
        }


    }


     public function getTodayCheckin(){
        try {
            $result = DB::connection('pgsql')->table('iclock_transaction')
            ->selectraw('distinct(empcode)','emp_id','punch_time')->where('punch_time','LIKE','%'.date('Y-m-d').'%')->where('punch_state',0)->get()->toarray();


            return $result;
        } catch (Exception $e) {
            
        }


    }

    // get all class function
    // get all today attendance function


    public function getStudentCountByLevel(){
        try {
            $result = DB::connection('pgsql')->table('personnel_position as a')->selectRaw("a.id,a.position_name,count(b.id)")->leftjoin('personnel_employee as b','a.id','=','b.position_id')->
            groupbyraw("a.id,a.position_name")->orderby('a.position_name')->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getAttendanceByMonth($classid){

        try {
             $result = DB::connection('pgsql')->table('personnel_employee as a')
             ->select('a.id','b.punch_time')
             ->leftjoin('iclock_transaction as b','b.emp_id','=','a.id')
             ->where('a.position_id',$classid)
             ->where('punch_state','0')
             ->whereMonth('punch_time',date('m'))
             ->get()->toarray();


             return $result;

        } catch (Exception $e) {
            
        }
    }


    public function getAttendanceByStudentID($studentid){

        try {
             $result = DB::connection('pgsql')->table('personnel_employee as a')
             ->select('a.id','b.punch_time')
             ->leftjoin('iclock_transaction as b','b.emp_id','=','a.id')
             ->where('a.id',$studentid)
             ->where('punch_state','0')
             ->whereMonth('punch_time',date('m'))
             ->get()->toarray();


             return $result;

        } catch (Exception $e) {
            
        }
    }



    public function getTodayPresent(){

        try {
            $result =  DB::connection('pgsql')->table('iclock_transaction')
                    ->whereDate('punch_time',date('Y-m-d'))
                    ->whereTime('punch_time','<=','08:10:00')
                    ->where('punch_state','0')
                    ->count();

            return $result;
        } catch (Exception $e) {
            
        }

    }


    public function getTodayTardy(){
        try {
              $result =  DB::connection('pgsql')->table('iclock_transaction')
                    ->whereDate('punch_time',date('Y-m-d'))
                    ->whereTime('punch_time','>','08:10:00')
                    ->where('punch_state','0')
                    ->count();

            return $result;
        } catch (Exception $e) {
            
        }
    }



    public function powerschoolfunction(){


        $result =  DB::connection('pgsql')->table('personnel_employee as a')

                    // ->select('a.first_name','a.last_name','a.emp_code','b.position_name','c.punch_time')
                    ->selectraw('a.first_name,a.last_name,a.emp_code,b.position_name,c.punch_time,c.punch_time::TIMESTAMP::TIME as punch_time2')

                    ->join('personnel_position as b','a.position_id','=','b.id')
                    ->leftjoin('iclock_transaction as c','a.id','=','c.emp_id')
                    ->whereDate('punch_time',date('Y-m-d'))
                    ->where('is_active',1)
                    ->where('c.punch_state',0)
                    ->orderby('b.position_name')
                    ->get()->toarray();


        return $result;
    }


}
