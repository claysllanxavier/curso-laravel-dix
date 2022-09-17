<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class BlogApiController extends Controller
{
    public function index(){
        $noticias = Noticia::orderBy('titulo')->get();

        return response()->json($noticias);
    }
}
