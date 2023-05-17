<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        ddd($request);
        return redirect()->back();
    }
}
