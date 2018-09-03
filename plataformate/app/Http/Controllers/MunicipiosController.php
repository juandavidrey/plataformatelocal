<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function show(Municipio $municipio)
    {

       //$posts =  $municipio->posts;
        return view('municipios',  [
            'posts' => $municipio->posts
        ]);
    }    
}
