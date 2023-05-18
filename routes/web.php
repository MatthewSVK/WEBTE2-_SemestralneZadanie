<?php

use App\Http\Controllers\ExportPDFController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LatexController;
use App\Http\Controllers\ImageUploadController;
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
})->name('home');

Route::post('/post-instruction', [ExportPDFController::class, 'postInstruction']);

Route::get('/download-pdf', [ExportPDFController::class, 'exportPDF']);

Route::get('/items/{id}', function($id){
    return (new ItemController)->show($id);
})->middleware(['auth', 'verified']);

Route::post('/items', [ItemController::class, 'submit'])->middleware(['auth', 'verified']);

Route::get('/student', [StudentController::class, 'makeStudent'])->middleware(['auth', 'verified']);

Route::get('/teacher', [TeacherController::class, 'showTeacherLayout'])->middleware(['auth', 'verified']);

Route::post('/submit-form', [FormController::class, 'submit'])->name('submit-form');

Route::get('language/{locale}', function(String $locale){
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('image/{filename}', [ItemController::class, 'displayImage'])->name('image.displayImage');

//For adding an image
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])->name('images.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';