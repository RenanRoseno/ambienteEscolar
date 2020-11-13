<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\EAController;
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


Route::get('/', function () {
	return view('welcome');
})->name('hom');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');	

Route::prefix('/ambienteEscolar')->group(function(){
	Route::get('/frequencias' , [EAController::class, 'frequencias'])->name('frequencias');
	Route::get('/avaliacoes' , [EAController::class, 'avaliacoes'])->name('avaliacoes');
	Route::get('/usuarios' , [EAController::class, 'usuarios'])->name('usuarios');
	Route::get('/turmas' , [EAController::class, 'turmas'])->name('turmas');
	Route::get('/documentos' , [EAController::class, 'documentos'])->name('documentos');
});



