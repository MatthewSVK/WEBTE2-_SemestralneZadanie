<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LatexController;
use App\Http\Controllers\StudentController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

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
    return view('index');
});

Route::get('/student', function(){
    return (new StudentController)->makeStudent();
});

Route::get('/teacher', function (){
    $files = [
        [
            "name" => "file1",
        ],
        [
            "name" => "file2",
        ],
        // Add more files as needed
    ];
//    $jsonString = '{"name": "uloha"}';
//    $files = json_decode($jsonString, true);
//    dd($files);
    return view('teacher', compact('files'));
});

Route::get('language/{locale}', function(String $locale){
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/dashboard', [LatexController::class, 'parse'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
