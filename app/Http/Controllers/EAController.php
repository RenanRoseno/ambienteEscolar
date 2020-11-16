<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class EAController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    public function usuarios(){
    	return view('usuarios/home');
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
