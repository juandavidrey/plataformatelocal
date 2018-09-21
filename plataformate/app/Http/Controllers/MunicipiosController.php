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
      //captura los posts asociados al municipio
      //$posts =  $municipio->posts;
      $municipios = Municipio::all();
      return view('municipios',  array(
            'posts' => $municipio->posts
      ));
    }

    /*** subir pdf ****/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::orderBy('created_at', 'DESC')->paginate(30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
