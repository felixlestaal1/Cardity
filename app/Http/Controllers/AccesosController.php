<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\registroDeAccesos;


class AccesosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $registroDeAccesos  = registroDeAccesos::all();
        return view('acceso.index')->with('registroDeAccesos',$registroDeAccesos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acceso.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acceso = new acceso();
        $acceso->id = $request->get('id');
        $acceso->id_usuario = $request->get('id_usuario');
        $acceso->id_tarjeta = $request->get('id_tarjeta');
        $acceso->id_areas = $request->get('id_areas');
        $acceso->save();
        return redirect('/accesos');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $acceso = acceso::find($id);
        return view('acceso.edit')->with('acceso',$acceso);
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
        $accesos = acceso::find($id);
        $accesos->id = $request->get('id');
        $accesos->id_usuario = $request->get('id_usuario');
        $accesos->id_tarjeta = $request->get('id_tarjeta');
        $accesos->id_areas = $request->get('id_areas');
        $accesos->save();
        return redirect('/accesos');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accesos = accesos::find($id);

        // Si el acceso está activo, lo desactivamos cambiando su estado a 0
        if ($accesos->estado == 1) {
            $accesos->estado = 0;
        }
        // Si el acceso está inactivo, lo activamos cambiando su estado a 1
        else {
            $accesos->estado = 1;
        }
        $accesos->save();
        return redirect('/accesos');
    

    }
}