<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function showTeacherLayout(){
        if(Auth::user()->role != 'teacher'){
            return redirect()->route('home');
        }

        $empty= DB::table("latexFiles")->get();
        if($empty->isEmpty()) $fileCount= (new FileController())->loadFiles();

        $files= DB::table("latexFiles")->get();
        $students= DB::table("users")->where("role", "student")->join("generated_tasks_by_student", "users.id", "=", "student_id")->get();
        return view("teacher",[
            "files"=> $files,
            "students"=> $students
        ]);
    }
}
