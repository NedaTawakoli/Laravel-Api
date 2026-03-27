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
    public function fetchStudent1(){
       $student = Student::all();
        return $student;
    }
    public function shart(){
    //  $student = Student::where("score",">",50)->orderByDesc("score")->get();
    //  $student = Student::where("score",">",50)->where(function($q){
    //   $q->where("Age",">",15)->orWhere("Age","<",50);
    //  })->get();
    // $student = Student::whereIn("id",[3,5])->get();
    // $student = Student::whereBetween("score",[30,50])->get();
    // $student = Student::whereNotBetween("score",[30,50])->get();
   $student = Student::where("name","LIKE","%AI%")->orWhere("name","LIKE","%ab%")->get();
        return $student;
    }
    public function query(){
       $student = Student::male()->get();
       return $student;
    }
    public function delete1(){
     Student::findOrFail(4)->delete();
      return "one item deleted";
    }
    public function showDeleted(){
       $student = Student::onlyTrashed();
       return $student;
    }
    public function restoreData(){
        Student::withTrashed()->findOrFail(2)->restore();
        return "one item restored";
    }
    public function partVeiw(Request $request){
       $student = Student::when($request->search,function($query) use($request){
        $query->whereAny([
            "name",
            "lastName",
            "gender",
            "Age",
            "score"
        ],'LIKE','%'.$request->search.'%');
       })->paginate(15);
       return  view("Student.home",compact("student"));
    }
    public function create(Request $request){
    $student = new Student();
    $student->name = $request->name;
    $student->lastName = $request->lastName;
    $student->Age = $request->age;
    $student->score = $request->score;
    $student->gender = $request->gender;
    $student->save();
    return redirect("student");
    }
}
