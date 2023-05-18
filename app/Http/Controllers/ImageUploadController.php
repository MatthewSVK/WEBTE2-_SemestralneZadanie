<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LatexController;
use App\Http\Controllers\Teacher\FileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        //return view('add_image');
    }
    //Store image
    public function storeImage(Request $request){

        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('storage'), $filename);
        }
        if($request->file('latex')){
            $file = $request->file('latex');
            $filename = $file->getClientOriginalName();
            $file->move(storage_path().'/latex', $filename);
            (new FileController)->loadFiles();
        }
        return redirect()->back();
    }
		//View image
    public function viewImage(){
        return view('view_image');
    }
}
