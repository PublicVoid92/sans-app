<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class setting_model extends Model
{
    use HasFactory;


    public function customFieldList(){
        try {
           $result = DB::connection('pgsql')->table('personnel_employeecustomattribute')->get()->toarray();

           return $result; 
        } catch (Exception $e) {
            
        }
    }


    public function getClassData(){
        try {

            // may need change after lecturer features add
            $result = DB::connection('pgsql')->table('personnel_position as pp')
                ->selectRAW("pp.position_name,pp.id,c.fullname,count(pe.id)")
                ->leftjoin('personnel_employee as pe','pp.id','=','pe.position_id')
                ->leftjoin('personnel_lecturer as c','pp.id','=','c.position_id')
                ->groupbyraw('pp.position_name,pp.id,c.fullname')->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function getClassByID($id){
        try {

            // Need to change after homeroom teacher is complete
            $result = DB::connection('pgsql')->table('personnel_position as a')
            ->select('a.id','a.position_name','b.fullname')
            ->leftjoin('personnel_lecturer as b','b.position_id','=','a.id')
            ->where('a.id',$id)->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }

    public function getAllClass(){
        try {
            $result = DB::connection('pgsql')->table('personnel_position')->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }

    public function getClassCount(){
        try {
             $result = DB::connection('pgsql')->table('personnel_position')->count();
            return $result;
        } catch (Exception $e) {
            
        }
    }
}
