<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
	public function listagem(){
		return view('turmas/listagem', );
	}

	public function cadastrar(){
		return view('turmas/cadastrar');
	}

	public function inserir(Request $req, Turma $turma){
		$turma->turma = $req->turma;
		$turma->turno = $req->turno;
		$turma->serie = $req->serie;
		$turma->qtd_max = $req->qtd_max;
		$turma->qtd_disponivel = $req->qtd_max;

		if($turma->save()){
			return redirect()->route('turmas')-> with('success', ' ');
		}else{
			return 0;
		}
	}

	public function editar($id){
		$turma = Turma::find($id);

		return view('turmas/editar', compact('turma'));
	}

	public function salvar(Request $req){
		$turma = Turma::find($req->id);
		$turma->turma = $req->turma;
		$turma->turno = $req->turno;
		$turma->serie = $req->serie;
		$turma->qtd_max = $req->qtd_max;
		$turma->qtd_disponivel = $req->qtd_max;

		if($turma->save()){
			return redirect()->route('turmas')-> with('success', ' ');
		}else{
			return redirect()->with('error', ' ');
		}
	}

	public function excluir($id){
		$turma = Turma::find($id);
		if($turma->delete()){
			return redirect()->route('turmas')-> with('success', 'Excluido com sucesso');
		}else{
			return redirect()->with('error', 'Erro ao excluir');
		}

	}
}
