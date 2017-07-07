<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use Log; 
use App\pessoas; 

class PessoaController extends Controller
{
    // Listando pessoas
    public function lista()
    {

    	return pessoas::get();
    }
 
    // Cadastrando Pessoa
    public function novo(Request $request)
    {
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
  		Log::debug('data');
 		Log::debug($data);
    	return pessoas::insertGetId($data);
    }
 
    // Editando pessoas
	public function editar($id, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 		Log::debug('data');
 		Log::debug($data);
		$res = pessoas::where('id',$id)
			->update($data);
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Excluindo pessoa
	public function excluir($id)
	{
		$res = pessoas::where('id',$id)
			-> delete();
			
		return ["status" => ($res)?'ok':'erro'];
	}
}
