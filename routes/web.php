<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EAController;


Route::get('/', function () {
	return view('welcome');
})->name('hom');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');	

Route::prefix('/ambienteEscolar')->group(function(){
	Route::get('/frequencias' , [EAController::class, 'frequencias'])->name('frequencias');
	Route::get('/avaliacoes' , [EAController::class, 'avaliacoes'])->name('avaliacoes');
	

	Route::prefix('/turmas')->group(function(){
		Route::get('/' , [EAController::class, 'turmas'])->name('turmas');
		Route::get('/cadastrar', [TurmaController::class , 'cadastrar'])->name('turmas.cadastrar');
		Route::get('/editar/{id}', [TurmaController::class , 'editar'])->name('turmas.editar');
		Route::get('/excluir/{id}', [TurmaController::class , 'excluir'])->name('turmas.excluir');
		Route::post('/inserir', [TurmaController::class , 'inserir'])->name('turmas.inserir');
		Route::post('/salvar', [TurmaController::class , 'salvar'])->name('turmas.salvar');
	});


	Route::prefix('/materias')->group(function(){
		Route::get('/' , [MateriaController::class, 'home'])->name('materias');
		Route::get('/cadastrar', [MateriaController::class , 'cadastrar'])->name('materias.cadastrar');
		Route::get('/editar/{id}', [MateriaController::class , 'editar'])->name('materias.editar');
		Route::get('/excluir/{id}', [MateriaController::class , 'excluir'])->name('materias.excluir');
		Route::post('/inserir', [MateriaController::class , 'inserir'])->name('materias.inserir');
		Route::post('/salvar', [MateriaController::class , 'salvar'])->name('materias.salvar');
	});
	

	Route::prefix('/usuarios')->group(function(){
		Route::get('/' , [EAController::class, 'usuarios'])->name('usuarios');
		Route::get('/cadastrar', [MateriaController::class , 'cadastrar'])->name('materias.cadastrar');
		Route::get('/editar/{id}', [MateriaController::class , 'editar'])->name('materias.editar');
		Route::get('/excluir/{id}', [MateriaController::class , 'excluir'])->name('materias.excluir');
		Route::post('/inserir', [MateriaController::class , 'inserir'])->name('materias.inserir');
		Route::post('/salvar', [MateriaController::class , 'salvar'])->name('materias.salvar');
	});


	Route::get('/documentos' , [EAController::class, 'documentos'])->name('documentos');
});



