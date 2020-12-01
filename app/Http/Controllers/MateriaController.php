<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Professores;

class MateriaController extends Controller
{
    public function home(){
    	$materias = Materia::all();
        $professores = Professores::all();

    	return view('materias/home', compact('materias', 'professores'));
    }


    public function cadastrar(){
        $professores = Professores::all();
    
        $compact = compact('professores');

    	return view('materias/cadastrar', $compact);
    }

    public function inserir(Request $req){
    	

        $materia = Materia::create($req->all());

    	
    	if($materia){
    		return redirect()->route('materias')->with('success', ' ');
    	}

    	return redirect()->with('error', ' ');
    }

    public function editar($id){
    	$professores = Professores::all();
        $materia = Materia::find($id);

    	return view('materias/editar', compact('materia','professores'));
    }

    public function excluir($id){
		$materia = Materia::find($id);

		if($materia->delete()){
			return redirect()->route('materias')->with('success', 'Excluido com sucesso');
		}else{
			return redirect()->with('error', 'Erro ao excluir');
		}

	}
	
		public function salvar(Request $req){
			
			$materia = Materia::find($req->id);
			$materia->materia = $req->materia;
			$materia->update();

			if($materia){
				return redirect()->route('materias')->with('success', ' ');
			}
			return redirect()->with('error', ' ');
	}
}
