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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/form', [App\Http\Controllers\MateriaController::class, 'showForm']);
    Route::match(['get', 'post'],'/estudiantes', [App\Http\Controllers\EstudiantesController::class, 'index'])->name('estudiantes.index');
    Route::match(['get', 'post'],'/notas', [\App\Http\Controllers\NotasController::class, 'index'])->name('notas.index');
});

require __DIR__.'/auth.php';
