<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Usuario;
use App\Models\Professores;
use App\Models\Aluno;


class FrequenciaController extends Controller
{
   public function cadastrar(){
   	$turmas = Turma::all();

   	return view('frequencias/cadastrar', compact('turmas'));
   }
}
