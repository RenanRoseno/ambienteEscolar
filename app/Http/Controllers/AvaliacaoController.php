<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Professores;

class AvaliacaoController extends Controller
{
    public function cadastrar(){
    	$materias = Materia::all();
    	$turmas = Turma::all();
    	$periodos = Periodo::all();
    	$compact = compact('turmas', 'materias', 'periodos');

    	return view('avaliacoes/cadastrar', $compact);
    }

    public function listar(){
    	return view('avaliacoes/listar');
    }
}
