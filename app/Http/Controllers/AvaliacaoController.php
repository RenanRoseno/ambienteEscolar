<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Frequencia;
use App\Models\Avaliacao;
use App\Models\Professores;

class AvaliacaoController extends Controller
{   

    public function relatorio($id){
        $aluno = Aluno::find($id);
        $turma = Turma::find($aluno->id_turma);
        $count = Frequencia::where('id_aluno', $aluno->id)->where('falta', 0)->count();
        $materias = Materia::all();
        $avaliacoes = Avaliacao::where('id_aluno' , $id)->get();
        $periodos = Periodo::all();
        $compact = compact('aluno', 'turma', 'count', 'materias', 'avaliacoes', 'periodos');

        return \PDF::loadView('avaliacoes/relatorio', $compact)->stream();
    }
    public function getAvaliacoes($turma, $periodo, $materia, $prova){
        $alunos = Aluno::where('id_turma', $turma)->get();
        $avaliacoes = Avaliacao::where('id_periodo', $periodo)->where('id_materia', $materia)->where('prova',$prova)->get();
        return compact('avaliacoes', 'alunos');

    }
    public function cadastrar(){
    	$materias = Materia::all();
    	$turmas = Turma::all();
    	$periodos = Periodo::all();
    	$compact = compact('turmas', 'materias', 'periodos');

    	return view('avaliacoes/cadastrar', $compact);
    }

    public function listar(){
        $materias = Materia::all();
        $turmas = Turma::all();
        $periodos = Periodo::all();
        $compact = compact('turmas', 'materias', 'periodos');

        return view('avaliacoes/listar', $compact);

    }

    public function salvar(Request $req){
        $alunos = Aluno::where('id_turma' , $req->turma)->get();
        

        foreach ($alunos as $key => $aluno) {
            $avaliacao = new Avaliacao();
            $matricula = $aluno->matricula;
            $prova = $req->prova;

            $avaliacao->id_materia = $req->materia;
            $avaliacao->id_aluno = $aluno->id;
            $avaliacao->id_periodo = $req->periodo;
            $avaliacao->id_professor = Auth::user()->id_usuario;
            $avaliacao->media = 0;
            $avaliacao->nota = $req->$matricula;
            $avaliacao->prova = $req->prova;
            


            if($avaliacao->media > 5){
                $avaliacao->situacao = "Aprovado";
            }else if($req->$matricula > 2){
                $avaliacao->situacao = "Recuperação";
            }else{
                $avaliacao->situacao = "Reprovado";
            }


            if($avaliacao->save()){
                echo "1";
            }else{
                echo "0"; break;
            }
        }
        
        
    }
}
