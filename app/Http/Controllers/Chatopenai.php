<?php

namespace App\Http\Controllers;

use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use OpenAi;

class Chatopenai extends Controller
{

    public function dashboard($id=null) {

        if($id){
            $chat=chat::find($id);
        }else{
            $chat=null;
        }

        $data = array('chat'=>$chat);
        return view('dashboard',$data);
    }
    public function guardar( Request $request) {
        
        
       

        $yourApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAi::client($yourApiKey);
        

        if($request->id){
            $cha=chat::find($request->id);
            

            $titulo='Dame los puntos de estimación con la siguente informacion '.$cha->detalle_historia.' en el siguente formato: (1: 3 puntos 2: 1 punto 3: 2 puntos, así sucesivamente...)';
            $result = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user', 
                        'content' => $titulo
                    ]
                ]
            ]);
            $resultado= $result->toArray()['choices'][0]['message']['content'];
            $cha->detalle_estimacion=$resultado;
            $cha->save();

        }else{
            $cha=new chat();
            $titulo='Dame las historias de usuario para un sistema de '.$request->nombre;
            $result = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user', 
                        'content' => $titulo
                    ]
                ]
            ]);
            $resultado= $result->toArray()['choices'][0]['message']['content'];
            $cha->titulo=$request->nombre;
            $cha->detalle_historia=$resultado;
            $cha->save();
        }

        

        Session::flash('success','ok');

        return redirect()->route('dashboard',$cha->id);

    }

    public function listado() {

        
        $data = array(
            'chats'=>chat::latest()->get()
        );
        return view('listado',$data);
    }

    public function eliminar($id)  {
        $chat=chat::find($id);
        $chat->delete();
        return redirect()->route('listado');
    }
}
