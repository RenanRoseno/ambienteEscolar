<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Avaliacao;
use App\Models\Professores;

class AvaliacaoController extends Controller
{
    public function getAvaliacoes($turma, $periodo, $materia){
        $avaliacoes = Avaliacao::where('id_periodo', $periodo)->where('id_materia', $materia)->get();
        return $avaliacoes;

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
            $avaliacao->$prova = $req->$matricula;
            
            switch ($prova) {
                case 'n1':
                    $avaliacao->media = $req->$matricula;
                break;
                case 'n2':
                    $av = Avaliacao::where('id_aluno', $aluno->id);
                    $avaliacao->media = ($req->$matricula + $av->n1)/2;
                break;
                case 'n3':
                    $av = Avaliacao::where('id_aluno', $aluno->id);
                    $avaliacao->media = ($req->$matricula + $av->n1 + $av->n2)/3;
                break;
                case 'n4':
                    $av = Avaliacao::where('id_aluno', $aluno->id);
                    $avaliacao->media = ($req->$matricula + $av->n1 + $av->n2)/4;
                break;

                default:
                    # code...
                break;
            }


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
