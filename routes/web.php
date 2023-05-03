<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return redirect()->route('index', ['locale' => 'en']);
});

Route::get('/{locale}', function (string $locale) {
    if(!in_array($locale, ['en', 'sk'])){
        abort(400, "Wrong language");
    }else{
        App::setLocale($locale);
        return view('index');
    }
    
})->name('index');
