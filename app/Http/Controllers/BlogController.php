<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $noticias = Noticia::where('user_id', auth()->user()->id)->get();

        return view('blog.index', compact('noticias'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'titulo' => ['required', 'max:40'],
            'conteudo' => ['required']
        ]);


        Noticia::create([
            'titulo' => $request->titulo,
            'user_id' => auth()->user()->id,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->to('/blog')
        ->with('sucesso', 'Notícia criada com sucesso.');
    }

    public function show($id){

        $noticia = Noticia::findOrFail($id);

        if($noticia->user_id != auth()->user()->id){
            abort(403, "Essa nóticia não e sua.");
        }

        return view('blog.show', compact('noticia'));
    }

    public function edit($id){
        $noticia = Noticia::findOrFail($id);

        return view('blog.edit', compact('noticia'));
    }

    public function update(Request $request, $id){
        $noticia = Noticia::findOrFail($id);

        $this->validate($request, [
            'titulo' => ['required', 'max:40'],
            'autor' => ['required', 'max:181'],
            'conteudo' => ['required']
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->autor = $request->autor;
        $noticia->conteudo = $request->conteudo;
        $noticia->save();

        return redirect()->to('/blog');
    }

    public function destroy($id){
        $noticia = Noticia::findOrFail($id);

        $noticia->delete();

        return redirect()->to('/blog');
    }
}
