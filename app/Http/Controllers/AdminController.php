<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Http\Requests\ValidaNews;


class AdminController extends Controller
{
   
    public function TodasNews(){


        $TodasNews = Newsletter::with('autor')->orderBy('id', 'desc')->paginate(5);
        return view('Admin.resumo', compact('TodasNews'));


    }

    public function Editar(Request $request)
    {
 
     $id = request('id');
     $dadosNoticias = Newsletter::where('id', $id)->first();
 
 
     if ($dadosNoticias) {
 
         return view('Admin.editar', compact('dadosNoticias', 'id'));
 
     } else {
 
       return abort(404);
     }
 
    }
 
    public function Editando(ValidaNews $request)
    {
 
     $id = request('id');
     $editaNoticia = Newsletter::where('id', $id)
     ->update([
       'titulo' => $request->titulo,
       'noticia' => $request->noticia,
     ]);
 
 
     if ($editaNoticia){
 
         return redirect()->route('Resumo')->with('sucesso','Noticia Editada com sucesso!');
         
     }else{
 
         return abort(404);
     }
   }
 
    public function Deletar(Request $request)
    {
 
        $id = request('id');
        $deletaNoticia = Newsletter::where('id', $id)->delete();
 
 
        if ($deletaNoticia) {
 
            return redirect()->route('Resumo')->with('sucesso','Noticia deletada com sucesso!');
 
        } else {
 
            return abort(404);
        }
    }
    

    public function Recebidos(){


        $id = request('id');
        $dadosNoticias = Newsletter::where('id', $id)->first();
    
    
        if ($dadosNoticias) {

            $recebidos = Newsletter::find(request('id'))
                        ->Noticia()
                        ->orderBy('created_at', 'desc')
                        ->with('EmailRecebido')
                        ->paginate(8);
    
            return view('Admin.recebeunews', compact('recebidos' , 'dadosNoticias'));
    
        } else {
    
          return abort(404);
        }

    }

}
