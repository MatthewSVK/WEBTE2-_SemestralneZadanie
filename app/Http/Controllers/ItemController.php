<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = DB::table("exercises")->find($id);
        return view('item', ['item' => $item]);
    }

    public function displayImage($filename){
    $path = storage_public('images/' . $filename);
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
