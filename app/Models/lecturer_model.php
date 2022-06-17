<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class lecturer_model extends Model
{
    use HasFactory;


    public function getAllLecturer(){
        try {
            $result = DB::connection('pgsql')->table('personnel_lecturer as a')
            ->selectraw('a.id,a.title,a.firstname,a.lastname,a.fullname,a.email,a.position_id,b.position_name')
            ->leftjoin('personnel_position as b','a.position_id','=','b.id')
                ->get()->toarray();

            return $result;
        } catch (Exception $e) {
            
        }
    }


    public function lecturerAdd($input){
        try {
            
            $status = DB::connection('pgsql')->table('personnel_lecturer')

                                            ->insertgetid([
                                                'username'=>$input['email'],
                                                'password'=>'abc123',
                                                'title'=>$input['title'],
                                                'firstname'=>$input['firstname'],
                                                'lastname'=>$input['lastname'],
                                                'fullname'=>$input['fullname'],
                                                'email'=>$input['email'],
                                                'position_id'=>$input['classname']






                                            ]);

            return $status;

        } catch (Exception $e) {
            
        }
    }


    public function lecturerEdit($input){
        try {
            $status = DB::connection('pgsql')->table('personnel_lecturer')
            ->where('id',$input['id'])
            ->update([

                
                'title'=>$input['title'],
                'firstname'=>$input['firstname'],
                'lastname'=>$input['lastname'],
                'fullname'=>$input['fullname'],
                'email'=>$input['email'],
                'position_id'=>$input['classname']


            ]);

            return $status;
        } catch (Exception $e) {
            
        }
    }


    public function lecturerDelete($input){
        try {
            $status = DB::connection('pgsql')->table('personnel_lecturer')
            ->where('id',$input['id'])->delete();


            return $status;
        } catch (Exception $e) {
            
        }
    }


    public function loginFunction($input){

        try {
            $existence = DB::connection('pgsql')->table('personnel_lecturer')->where('username',$input['username'])->first();

            if (!empty($existence)) {
                if ($existence->password == $input['password']) {
                    // password match
                    return $existence->id;
                }else{
                    //password not match
                    return 0;
                }

            }else{
                //user not found
                return 0;
            }
        } catch (Exception $e) {
            
        }
    }


    public function getLecturerById($id){

        try {
            $lecturer_single = DB::connection('pgsql')->table('personnel_lecturer')->where('id',$id)->first();

            return $lecturer_single;
        } catch (Exception $e) {
            
        }
    }


    public function getLecturerCount(){
        try {
            $count = DB::connection('pgsql')->table('personnel_lecturer')->count();

            return $count;
        } catch (Exception $e) {
            
        }
    }
}
