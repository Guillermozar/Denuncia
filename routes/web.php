<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
   });
});

Auth::routes();
Route::resource('audits', App\Http\Controllers\AuditController::class);
Route::get('reporte/denuncias', [App\Http\Controllers\ReporteController::class, 'reporte_denuncia'])->name('reporte_denuncia')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('denuncias', App\Http\Controllers\DenunciaController::class);


Route::resource('estados', App\Http\Controllers\EstadoController::class);


Route::resource('users', App\Http\Controllers\UserController::class);
