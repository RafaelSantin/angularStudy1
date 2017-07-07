<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use Log; 
use App\mensagens; 

class MessagesController extends Controller
{
    // Listando pessoas
    public function lista($id = null)
    {

        $query =  mensagens::join('pessoas','pessoas.id','=','mensagens.pessoas_id')
                ->orderBy('data_envio','desc');
        if(!empty($id))
        {
            $query->where('pessoas_id',$id);
        }

        return $query->get();
    }
 
    // Cadastrando Pessoa
    public function novo(Request $request)
    {
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
  		Log::debug('data');
 		Log::debug($data);
    	return mensagens::insertGetId($data);
    }
}
