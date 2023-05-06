<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function update(Request $request, String $lang){
        if(!in_array($lang, ['en', 'sk'])){
            abort(400, "Wrong language");
        }else{
            App::setLocale($lang);
            return redirect($request->path());
        }
    }
}
