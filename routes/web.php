<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\HomeController;

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
Route::get('/not_found',function (){
    return view('not_found');
});
// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

//login user
Route::get('/login',[LoginController::class, 'show'])->name('login.show');
Route::post('/login',[LoginController::class, 'login'])->name('login');
//logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout.logout');

 
//register routes
Route::get('/register',function (){
    return view('auth.register');
});
 
//login admin
Route::get('/admin/login',[LoginController::class, 'showAdminLoginForm'])->name('admin.login-show');
Route::post('/admin/login',[LoginController::class,'loginAdmin'])->name('admin.login');
//Admin resource
Route::resource('admins',AdminController::class);
    

Route::get('/modules',function (){
    return view('module.list_module');
})->name('list_module');

Route::get('/modules/id',function (){
    return view('module.module');
})->name('module');

Route::get('/modules/ajoute',function (){
    return view('module.ajouter_module');
})->name('ajoute_module');

Route::get('/modules/ajoute-avancement',function (){
    return view('module.ajoute_avancemant');
})->name('ajoute_avancement');

Route::get('/modules/avancement',function (){
    return view('module.avencemen');
})->name('info_module');

Route::get('/modules/alert_avancement',function (){
    return view('module.alert_avancement');
})->name('avancement');


Route::get('/professeurs/add',function (){
    return view('prof.ajoute_prof');
})->name('add_professeur');
Route::get('/professeurs',function (){
    return view('prof.list_prof');
})->name('list_professeur');
 


 
Route::post('/import-excel/module', [ExcelImportController::class, 'importModule'])->name('excel.module');
Route::post('/import-excel/avancement', [ExcelImportController::class, 'avancement'])->name('excel.avance_module');
