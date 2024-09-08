<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DisciplineController;
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
    Route::get('/disciplinas', [DisciplineController::class, 'index'])->name('disciplines.index');
    Route::get('/disciplinas/criar', [DisciplineController::class, 'create'])->name('disciplines.create');
    Route::post('/disciplinas/store', [DisciplineController::class, 'store'])->name('disciplines.store');
    Route::get('/disciplinas/delete/{id}', [DisciplineController::class, 'destroy'])->name('disciplines.delete');
    Route::get('/disciplinas/editar/{id}', [DisciplineController::class, 'edit'])->name('disciplines.edit');
    Route::post('/disciplinas/update/{id}', [DisciplineController::class, 'update'])->name('disciplines.update');

    /*Projetos */
    Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projetos/criar', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projetos/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projetos/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.delete');
    Route::get('/projetos/editar/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projetos/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projetos/{id}', [ProjectController::class, 'show'])->name('projects.show');

    /*Tarefas*/
    Route::get('/projetos/{id}/tarefas', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/projetos/{id}/tarefas/criar', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/projetos/{id}/tarefas/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/projetos/{project_id}/tarefas/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.delete');
    
    
    Auth::routes();
});






require __DIR__.'/auth.php';