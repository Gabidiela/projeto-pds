<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;
use App\Models\Professor;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //HOMEPAGE
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    // PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //PROFESSOR
    Route::get('/professores', [ProfessorController::class, 'index'])->name('professor.list');
    Route::get('/professor/criar', [ProfessorController::class, 'create'])->name('professor.criar');
    Route::post('/professor/store', [ProfessorController::class, 'store'])->name('professor.store');
    Route::get('/professor/{id}/editar', [ProfessorController::class, 'edit'])->name('professor.editar');
    Route::put('/professor/{id}/editar', [ProfessorController::class, 'update'])->name('professor.atualizar');
    Route::get('/professor/{id}/visualizar', [ProfessorController::class, 'show'])->name('professor.visualizar');
    Route::get('/professor/{id}/excluir', [ProfessorController::class, 'destroy'])->name('professor.excluir');

});

require __DIR__.'/auth.php';
