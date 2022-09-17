<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $noticias = Noticia::get();

        return view('blog.index', compact('noticias'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'titulo' => ['required', 'max:40'],
            'autor' => ['required', 'max:181'],
            'conteudo' => ['required']
        ]);


        Noticia::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->to('/blog');
    }

    public function show($id){
        $noticia = Noticia::findOrFail($id);

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
