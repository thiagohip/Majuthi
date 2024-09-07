<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    if(auth()->check()){
       $controller = new Controller();
       return $controller->dashboard();
    }
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    /*Perfil */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*Tipos */
    Route::get('/tipos', [TypeController::class, 'index'])->name('types.index');
    Route::get('/tipos/criar', [TypeController::class, 'create'])->name('types.create');
    Route::post('/tipos/store', [TypeController::class, 'store'])->name('types.store');
    Route::get('/tipos/delete/{id}', [TypeController::class, 'destroy'])->name('types.delete');
    Route::get('/tipos/editar/{id}', [TypeController::class, 'edit'])->name('types.edit');
    Route::post('/tipos/update/{id}', [TypeController::class, 'update'])->name('types.update');

    /*Projetos */
    Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projetos/criar', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projetos/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projetos/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.delete');
    Route::get('/projetos/editar/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projetos/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
});


Auth::routes();




require __DIR__.'/auth.php';