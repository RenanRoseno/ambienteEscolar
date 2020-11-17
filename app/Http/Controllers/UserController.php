<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UserController extends Controller
{
    public function cadastrar(){
    	return view('usuarios/cadastrar');
    }

    public function inserir(Request $req, Usuario $user){
    	$user->email = $req->usuario;
    	$user->password = Hash::make($req->senha);
    	$user->name = $req->nome;
    	
    	if($user->save()){
    		return redirect()->route('usuarios');
    	}
    	//$user->name = $req
    }
}
