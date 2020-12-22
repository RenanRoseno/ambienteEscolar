<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Usuario;
use App\Models\Professores;
use App\Models\Aluno;
use App\Models\Frequencia;


class FrequenciaController extends Controller
{	
	public function getFrequencias($turma, $ano, $data){

		
		$frequencias = Frequencia::where('data', 'like', '%'.$data.'%')->get();

		$alunos = Aluno::where('id_turma', $turma)->get();

		return compact('frequencias', 'alunos');
	}
	public function cadastrar(){
		$turmas = Turma::all();

		return view('frequencias/cadastrar', compact('turmas'));
	}

	public function salvar(Request $req){
		//dd($req->all());

		$verifica  = true;
		$alunos = Aluno::where('id_turma', $req->turma)->get();

		foreach ($alunos as $key => $aluno) {
			$frequencia = new Frequencia();
			$a = $aluno->matricula;

			$frequencia->falta = is_null($req->$a) ? 1 : 0;
			$frequencia->data = $req->data;
			$frequencia->id_aluno = $aluno->id;

			$teste = $frequencia->save();
			if(!$teste){
				$verifica = false;
				break;
			}
		}

		if($verifica){
			return redirect()->route('frequencias.cadastrar')->with('success', 'OK');
		}
		return redirect()->route('frequencias.cadastrar')->with('error', 'OK');
	}
}
