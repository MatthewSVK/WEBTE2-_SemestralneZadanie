<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $students= DB::table("users")->where("role", "student")->get();

        return view("teacher",[
            "files"=> $files,
            "students"=> $students
        ]);
    }
}
