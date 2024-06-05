<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LogsController;
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

Route::get('/', function () { return view('welcome'); });

Route::resource('students', StudentController::class)->middleware(['auth', 'verified']);

Route::resource('assists',AssistController::class)->middleware(['auth','verified']);

Route::get('logs', [LogsController::class, 'index'])->middleware(['auth','admin'])->name('logs');

Route::get('parameters',[ParameterController::class,'index'])->middleware(['auth'])->name('parameters.index');
Route::put('parameters',[ParameterController::class,'update'])->middleware(['auth'])->name('parameters.update');

Route::get('export/pdf',[ExportController::class,'exportPdf'])->middleware(['auth'])->name('export.pdf');
Route::get('export/excel',[ExportController::class,'exportExcel'])->middleware(['auth'])->name('export.excel');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('/assists', function () { return view('assists.create');})->middleware(['auth'])->name('assists');
// Route::post('/assists', [AssistController::class,"getStudentDni"])->middleware(['auth'])->name("assists.getStudentDni");
// Route::post('assists/{id}', [AssistController::class,"setAssist"])->middleware(['auth'])->name("assists.setAssist");

//Route::get('/assists.create')->name('assist');

//Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');