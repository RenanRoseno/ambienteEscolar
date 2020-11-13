<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EAController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    public function usuarios(){
    	return view('usuarios/home');
    }

     public function turmas(){
    	return view('turmas/home');
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
