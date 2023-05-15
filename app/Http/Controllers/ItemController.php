<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = DB::table("exercises")->find($id);
        return view('item', ['item' => $item]);
    }
}
