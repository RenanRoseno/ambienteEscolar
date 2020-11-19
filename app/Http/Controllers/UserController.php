<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Aluno;
use App\Models\Professores;

class UserController extends Controller
{
    public function cadastrar(){
    	return view('usuarios/cadastrar');
    }

    public function inserir(Request $req, Usuario $user){

     $retorno = 0;
     switch ($req->tipo) {
         case "1":
                 //Aluno
         $aluno = new Aluno();
         $aluno->nome = $req->nome;
         $aluno->data_nasc = $req->data_nasc;
         $aluno->cpf = $req->cpf;
         $aluno->rg = $req->rg;
         $aluno->matricula = $req->matricula;
         $aluno->nome = $req->nome;
         $retorno = ($aluno->save()) ? 1 : 0 ;

         break;
         case "2":
                 //Professor
         $professor = new Professores();
         $professor->nome = $req->nome;
         $professor->data_nasc = $req->data_nasc;
         $professor->rg = $req->rg;
         $professor->cpf = $req->cpf;
         $professor->email = $req->email;
         $retorno = ($professor->save()) ? 1 : 0 ;

         break;
         default:
         break;

     }

     $user->email = $req->usuario;
     $user->password = Hash::make($req->senha);
     $user->name = $req->nome;
     $user->role_id = $req->tipo;

     if($user->save() && $retorno == 1){
      return redirect()->route('usuarios');
  }
    	//$user->name = $req
}
}
