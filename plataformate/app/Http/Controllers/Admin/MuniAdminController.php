<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Municipio;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Session;
use App\Http\Requests\MunicipiosRequest;

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
     public function edit($id)
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
    public function update($municipio, MunicipiosRequest $request) //, $id MunicipiosRequest $municipiosrequest
    {
        //
        // dd($request->file('actapdf'));
        // $request->file('actapdf')->store('/public/pdf');
        $municipio = Municipio::find($municipio);
        $municipio->representante1 = Input::get('representante1');
        $municipio->representante2 = Input::get('representante2');
        $municipio->rol_rep_1 = Input::get('rol_rep_1');
        $municipio->rol_rep_2 = Input::get('rol_rep_2');
        $municipio->correo_rep_1 = Input::get('correo_rep_1');
        $municipio->correo_rep_2 = Input::get('correo_rep_2');
        $municipio->telefono_rep_1 = Input::get('telefono_rep_1');
        $municipio->telefono_rep_2 = Input::get('telefono_rep_2');
        if (!empty($request->file('actapdf')) && $request->hasFile('actapdf')) {
          $actapdf = $request->file('actapdf');
          $titulo = $actapdf->getClientOriginalName();
          $municipio->acta = $request->file('actapdf')->storeAs('/public/pdf/acta', $titulo);
        }
        if (!empty($request->file('resolucionpdf')) && $request->hasFile('resolucionpdf')) {
          $resolucionpdf = $request->file('resolucionpdf');
          $titulo = $resolucionpdf->getClientOriginalName();
          $municipio->resolucionpdf = $request->file('actapdf')->storeAs('/public/pdf/resolucion', $titulo);
        }
        if (!empty($request->file('decretopdf')) && $request->hasFile('decretopdf')) {
          $decretopdf = $request->file('decretopdf');
          $titulo = $decretopdf->getClientOriginalName();
          $municipio->decreto = $request->file('decretopdf')->storeAs('/public/pdf/decreto', $titulo);
        }
        $municipio->update($request->all());
        return back()->with('flash', 'Municipio actualizado');
        //return redirect()->route('admin.muninfo.edit', $municipio)->with('flash', 'Esto es el flash mágico');
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
