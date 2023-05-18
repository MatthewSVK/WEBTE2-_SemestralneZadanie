<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = DB::table("exercises")->find($id);
        return view('item', ['item' => $item, 'id' => $id]);
    }

    public function submit(Request $request){
        $task = DB::table("exercises")->distinct()->where("id", $request->taskId)->get();
        $requestContent = $request->collect();
        if(!is_null($task)){
            if(trim(str_replace('}','', str_replace('{','', $task[0]->solution))) == trim(str_replace('}','', str_replace('{','', $request->submitedResult)))){
                $File = DB::table("latexFiles")->distinct()->where("name", $task[0]->file_name)->get();
                DB::table("users")->where("id", $request->userId)->update(["points_total" => Auth::user()->points_total + $File[0]->points, "num_tasks" => Auth::user()->num_tasks++, "num_handed" => Auth::user()->num_handed++]);
            }else{
                return "NOPE";
            }
        }
    }

    public function displayImage($filename){
    $path = public_path($filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;

}
}
