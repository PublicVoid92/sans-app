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


}
