<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function listagem(){
    	return view('turmas/listagem');
    }
}
