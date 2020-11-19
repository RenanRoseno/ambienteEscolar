<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Usuario;
use App\Models\Professores;
use App\Models\Aluno;


class EAController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        $professores = Professores::all();
        $alunos = Aluno::all();

        $compact = compact('usuarios','professores', 'alunos');
    	return view('usuarios/home', $compact);
    }

    public function turmas(){
        $count  = Turma::all()->count();
        $turmas = Turma::paginate(5);
        
        return view('turmas/home', compact('turmas'));
    }

    public function avaliacoes(){
    	return view('avaliacoes/home');
    }


    public function frequencias(){
    	return view('frequencias/home');
    }


    public function documentos(){
    	return view('documentos/home');
    }
}
