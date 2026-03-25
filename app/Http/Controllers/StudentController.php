<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function addDate(){
        DB::table('students')->insert([
            "name"=>"Ali",
            "lastName"=>"qurbani",
            "Date-of-birth"=>"2020-11-05",
            // "gender"=>"male",
            "Age"=>20,
        ]);
        return "Data inserted";
    }
    public function Add(){
        DB::table("students")->insert([
            "name"=>"Ahmad",
            "lastName"=>"Ahmadi",
            "Date-of-birth"=>"2018-08-11",
            "Age"=>29,
        ]);
        return "Data inserted";
    }
    public function fetchStudent(){
        $allStudent = DB::table("students")->orderBy("score")->get();
        return $allStudent;
    }
    public function updateStudent(){
        DB::table("students")->where("score","<",20)->update([
            "lastName"=>"شما ناکام ماندید",
        ]);
        return "update succssfully";
    }
    public function deleteStudent(){
        DB::table("students")->where("score","<",18)->delete();
        return "deleted successfully";
    }
    public function fetchDate(){
      $student = new Student();
      $student->name = "Sadaf";
      $student->lastName = "Qurbani";
    //   $student->Date-of-birth = "2015-04-28";
      $student->Age = 20;
      $student->gender = "Female";
      $student->score = 90;
      $student->save();
      return "Date added successfully";
    }
}
