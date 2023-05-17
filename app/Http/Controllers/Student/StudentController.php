<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LatexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller{

    public function makeStudent(){
        DB::table("exercises")->truncate();

        $files= DB::table("latexFiles")->where("active", 1)->get();

        foreach ($files as $results){
            foreach ($results as $result){
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



