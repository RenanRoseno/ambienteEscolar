<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function getAlunos($turma){
    	$alunos = Aluno::where('id_turma', $turma)->get();
    	return $alunos;
    }
}
