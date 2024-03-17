<?php

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
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('dashbord.home');
})->name('home');
Route::get('/group', function () {
    return view('dashbord.list_groupe');
})->name('list_groupe');
Route::get('/group/create', function () {
    return view('dashbord.Ajouter_group');
})->name('add_group');

Route::get('/stagiaire', function () {
    return view('dashbord.list_stagiaire');
})->name('list_stagiaire');
Route::get('/stagiaire/create', function () {
    return view('dashbord.ajouter_stagiaire');
})->name('add_stagiaire');
Route::get('/stagiaire/absence', function () {
    return view('dashbord.stagiaire_absence');
})->name('stagiaire_absence');
Route::get('/stagiaire/absence/update', function () {
    return view('dashbord.update_absence');
})->name('update_absence');