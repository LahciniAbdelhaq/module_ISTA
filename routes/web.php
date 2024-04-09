<?php

use App\Http\Controllers\AvancemantController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\GroupProfesseurModuleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('admin')->group(function () {
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::resource('modules' , ModuleController::class);
    Route::resource('professeurs', ProfesseurController::class);
    Route::resource('groupsProfesseursmodules' , GroupProfesseurModuleController::class);
});


// exel import
Route::post('/import-excel/prof', [ExcelImportController::class, 'importProf'])->name('excel.Prof');
Route::post('/import-excel/module', [ExcelImportController::class, 'importModule'])->name('excel.module');
Route::post('/import-excel/avancement', [ExcelImportController::class, 'avancement'])->name('excel.avance_module');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
