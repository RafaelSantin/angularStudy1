<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use Log; 

class MessagesController extends Controller
{
    // Listando pessoas
    public function lista()
    {

    	return DB::table('mensagens')
    			->join('pessoas','pessoas.id','=','mensagens.pessoas_id')
    			->get();
    }
 
    // Cadastrando Pessoa
    public function novo(Request $request)
    {
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
  		Log::debug('data');
 		Log::debug($data);
    	return DB::table('mensagens')
    		->insertGetId($data);
    }
}
