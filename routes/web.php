<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EAController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\FrequenciaController;
use App\Http\Controllers\DocumentosController;


Route::get('/', function () {
	return view('auth/login');
})->name('hom');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');	

Route::prefix('/ambienteEscolar')->group(function(){

	Route::get('/getFrequencias/{turma}/{ano}/{data}' , [FrequenciaController::class, 'getFrequencias'])->name('getFrequencias');
	Route::get('/getAlunos/{turma}' , [AlunoController::class, 'getAlunos'])->name('getAlunos');
	Route::get('/getAvaliacoes/{turma}/{periodo}/{materia}/{prova}' , [AvaliacaoController::class, 'getAvaliacoes'])->name('getAvaliacoes');

	Route::prefix('/frequencias')->group(function(){
		Route::get('/' , [EAController::class, 'frequencias'])->name('frequencias');
		Route::get('/cadastrar', [FrequenciaController::class , 'cadastrar'])->name('frequencias.cadastrar');
		Route::get('/listar', [FrequenciaController::class , 'listar'])->name('frequencias.listar');
		Route::get('/editar/{id}', [FrequenciaController::class , 'editar'])->name('frequencias.editar');
		Route::get('/excluir/{id}', [FrequenciaController::class , 'excluir'])->name('frequencias.excluir');
		Route::post('/inserir', [FrequenciaController::class , 'inserir'])->name('frequencias.inserir');
		Route::post('/salvar', [FrequenciaController::class , 'salvar'])->name('frequencias.salvar');
	});

	Route::prefix('/documentos')->group(function(){
		Route::get('/' , [EAController::class, 'frequencias'])->name('frequencias');
		Route::get('/cadastrar', [DocumentosController::class , 'cadastrar'])->name('documentos.cadastrar');
		Route::get('/listar', [DocumentosController::class , 'listar'])->name('documentos.listar');
		Route::get('/editar/{id}', [DocumentosController::class , 'editar'])->name('documentos.editar');
		Route::get('/excluir/{id}', [DocumentosController::class , 'excluir'])->name('documentos.excluir');
		Route::post('/inserir', [DocumentosController::class , 'inserir'])->name('documentos.inserir');
		Route::post('/salvar', [DocumentosController::class , 'salvar'])->name('documentos.salvar');
	});

	Route::prefix('/avaliacoes')->group(function(){
		Route::get('/' , [EAController::class, 'avaliacoes'])->name('avaliacoes');
		Route::get('/boletim/{id}' , [AvaliacaoController::class, 'relatorio'])->name('boletim');
		Route::get('/cadastrar', [AvaliacaoController::class , 'cadastrar'])->name('avaliacoes.cadastrar');
		Route::get('/listar', [AvaliacaoController::class , 'listar'])->name('avaliacoes.listar');
		Route::get('/editar/{id}', [AvaliacaoController::class , 'editar'])->name('avaliacoes.editar');
		Route::get('/excluir/{id}', [AvaliacaoController::class , 'excluir'])->name('avaliacoes.excluir');
		Route::post('/inserir', [AvaliacaoController::class , 'inserir'])->name('avaliacoes.inserir');
		Route::post('/salvar', [AvaliacaoController::class , 'salvar'])->name('avaliacoes.salvar');
	});


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
		Route::get('/cadastrar', [UserController::class , 'cadastrar'])->name('usuarios.cadastrar');
		Route::get('/editar/{id}', [UserController::class , 'editar'])->name('usuarios.editar');
		Route::get('/excluir/{id}', [UserController::class , 'delete'])->name('usuarios.excluir');
		Route::post('/inserir', [UserController::class , 'inserir'])->name('usuarios.inserir');
		Route::post('/salvar', [UserController::class , 'salvar'])->name('usuarios.salvar');
	});


	Route::get('/documentos' , [EAController::class, 'documentos'])->name('documentos');
});



