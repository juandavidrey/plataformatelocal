<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Municipio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function intro()
    {
    	return view('welcome');
    }
    public function home()
    {
    	return view('index');
    }
    public function mapa()
    {
    	return view('mapa');
    }

    public function grupos()
    {
        $posts = Post::all();         
    	return view('grupos', compact('posts'));
    }

}
