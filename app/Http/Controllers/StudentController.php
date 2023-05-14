<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller{

    public function makeStudent(){
        DB::table("exercises")->truncate();

        $result= (new LatexController)->parseLatex(Storage::disk('latex')->get('odozva01pr.tex'));

        foreach ($result as $item){
            DB::table("exercises")->insert($item);
        }

        $categories= DB::table("exercises")->get();

        return view("student",[
            "categories"=> $categories,
            "items"=>$categories
        ]);
    }


}



