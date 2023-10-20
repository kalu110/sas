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
Route::get('/galerija', function () {
    return view('galerija');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/loszadah', function () {
    return view('loszadah');
});
Route::get('/desnitrudnoca', function () {
    return view('desnitrudnoca');
});
Route::get('/parodontopatija', function () {
    return view('parodontopatija');
});
Route::get('/usluge', function () {
    return view('usluge');
});





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rezervacijaAdmin', [App\Http\Controllers\HomeController::class, 'rezervacijaAdmin'])->name('rezervacijaAdmin');
Route::get('/rezervisi', [App\Http\Controllers\TerminiController::class, 'rezervisi']);
Route::post('/dodajRezervaciju', [App\Http\Controllers\TerminiController::class, 'dodajRezervaciju']);
Route::delete('/obrisiRezervaciju/{id}', [App\Http\Controllers\TerminiController::class, 'obrisiRezervaciju']);
Route::post('/updateNapomena/{id}/{text}', [App\Http\Controllers\TerminiController::class, 'updateNapomena']);
Route::post('/dodajSlobodanDan', [App\Http\Controllers\TerminiController::class, 'dodajSlobodanDan']);
Route::get('/eKartoni', [App\Http\Controllers\HomeController::class, 'eKartoni']);
Route::post('/deleteSlobodniDani/{id}', [App\Http\Controllers\TerminiController::class, 'deleteSlobodniDani']);


