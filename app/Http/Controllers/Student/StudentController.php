<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LatexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller{

    public function makeStudent(){
        DB::table("exercises")->truncate();

        $files= DB::table("latexFiles")->where("active", true)->get();

        foreach ($files as $results => $result){
            if (($result->from < now() && $result->to >now()) || ($result->from ==null || $result->to==null)){
                    $results= (new LatexController)->parseLatex(Storage::disk('latex')->get($result->name));
                    DB::table("exercises")->insert($results);
            }
        }

        $categories= DB::table("exercises")->get();

        return view("student",[
            "categories"=> $categories,
            "items"=>$categories
        ]);
    }


}



