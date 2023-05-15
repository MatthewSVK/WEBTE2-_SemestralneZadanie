<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LatexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
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
    return view('index');
});

Route::get('/student', function(){
    return (new StudentController)->makeStudent();
});

Route::get('/items/{id}', function($id){
    return (new ItemController)->show($id);
});


Route::get('/teacher', function (){
    return (new TeacherController)->showTeacherLayout();
});

Route::post('/submit-form', [FormController::class, 'submit'])->name('submit-form');


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
