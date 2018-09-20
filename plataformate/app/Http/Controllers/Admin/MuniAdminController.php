<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Municipio;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class MuniAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $municipios = Municipio::all();
      	return view('admin.muninfo.index', compact('municipios'));
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
    public function store(Request $request, Municipio $municipios)
    {
        //
        $request->file('actapdf')->store('/public/pdf');
        return back()->with('flash', 'Esto es el flash mágico');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipios)
    {
        //
        $municipio = Municipio::find($id);
        // $municipios = Municipio::all();
        return view('admin.muninfo.edit', compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( MunicipiosRequest $municipiosrequest, Municipio $municipios) //Request $request, $id
    {
        //
        // dd($request->file('actapdf'));
        // $request->file('actapdf')->store('/public/pdf');
        // return $request->all();
        $municipio = Municipio::find($municipio);
        dd($municipio);
        $municipio->update($request->all());
        return back()->with('info', 'Municipio actualizado');
        //return redirect()->route('admin.muninfo.edit', $municipios)->with('flash', 'Esto es el flash mágico');
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
