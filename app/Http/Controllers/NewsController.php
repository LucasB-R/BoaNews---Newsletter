<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Newsletter;
use App\Http\Requests\ValidaNews;


class NewsController extends Controller
{

   public function MinhasNews()
   {

    $VerNoticias = Usuarios::find(Auth::user()->id)->Noticias()->paginate(5);
    return view('News.dashboard', compact('VerNoticias'));


   }

   public function Nova(ValidaNews $request)
   {
       $CriaNoticia = new Newsletter;
       $CriaNoticia->titulo = $request->titulo;
       $CriaNoticia->noticia = $request->noticia;
       $CriaNoticia->id_usuario = Auth::user()->id;

       $salva = $CriaNoticia->save();

       if ($salva){

           return redirect()
           ->Route('Dashboard')
           ->with('sucesso', 'Sua Notícia foi publicada!');

       }else{
           return redirect()
           ->back();
       }


   }

   public function Editar(Request $request)
   {

    $id = request('id');
    $dadosNoticias = Newsletter::where('id', $id)->where('id_usuario', Auth::user()->id)->first();


    if ($dadosNoticias) {

        return view('News.editar', compact('dadosNoticias', 'id'));

    } else {

      return abort(404);
    }

   }

   public function Editando(ValidaNews $request)
   {

    $id = request('id');
    $editaNoticia = Newsletter::where('id', $id)
    ->where('id_usuario', Auth::user()->id)
    ->update([
      'titulo' => $request->titulo,
      'noticia' => $request->noticia,
    ]);


    if ($editaNoticia){

        return redirect()->route('Dashboard')->with('sucesso','Noticia Editada com sucesso!');
        
    }else{

        return abort(404);
    }

   }

   public function Deletar(Request $request)
   {

       $id = request('id');
       $deletaNoticia = Newsletter::where('id', $id)->where('id_usuario', Auth::user()->id)->delete();


       if ($deletaNoticia) {

           return redirect()->route('Dashboard')->with('sucesso','Noticia deletada com sucesso!');

       } else {

           return abort(404);
       }
   }
  






}
