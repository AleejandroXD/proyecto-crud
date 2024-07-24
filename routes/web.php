<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NotasController;

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
Route::get('/form', [MateriaController::class, 'showForm']);
Route::match(['get', 'post'],'/estudiantes', [EstudiantesController::class, 'index'])->name('estudiantes.index');
Route::match(['get', 'post'],'/notas', [NotasController::class, 'index'])->name('notas.index');