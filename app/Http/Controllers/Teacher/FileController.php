<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function loadFiles()
    {
        DB::table("latexFiles")->truncate();

        $files = Storage::disk("latex")->files();
        if ($files == null) return;
        for ($i = 0; $i< count($files); $i++) {
            DB::table("latexFiles")->insert([
                "name" => $files[$i],
            ]);
        }
       return count($files);
    }
}
