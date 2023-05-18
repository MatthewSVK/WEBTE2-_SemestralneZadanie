<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LatexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller{

    public function makeStudent(){

        $files= DB::table("latexFiles")->where("active", true)->get();
        $i=0;
        foreach ($files as $results => $result){
            if (($result->from < now() && $result->to >now()) || ($result->from ==null || $result->to==null)){
                    $results= (new LatexController)->parseLatex(Storage::disk('latex')->get($result->name));
                    DB::table("exercises")->insert($results);
                    DB::table("exercises")->where("id", $results[$i]["ID"])->update(["file_name" => $result->name]);
            }
            $i++;
        }

        $items= [];
        $categories=[]; // DB::table("exercises")->get("file_name");
        $i=0;
        foreach ($files as $file){

            $res= DB::table("exercises")->where("file_name", $file->name)->get();
            $count= count($res);
            $index= rand(0, $count-1);
            $items[$i]= $res[$index];
            $i++;
        }


        return view("student",[
            "categories"=> $categories,
            "items"=>$items
        ]);
    }


}



