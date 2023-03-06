<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\tarjetas;


class TarjetasController extends Controller
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
        $tarjetas = tarjetas::all();
        return view('tarjeta.index')->with('tarjetas',$tarjetas);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarjeta.create');
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarjetas = new tarjetas();
        $tarjetas->id = $request->get('id');
        $tarjetas->id_usuario = $request->get('id_usuario');
        $tarjetas->id_areas = $request->get('id_areas');
        $tarjetas->eliminado = $request->get('eliminado');
        $tarjetas->save();
        return redirect('/tarjetas');
 
 
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

  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarjetas = tarjetas::find($id);

        // Si el acceso está activo, lo desactivamos cambiando su estado a 0
        if ($tarjetas->eliminado == 1) {
            $tarjetas->eliminado = 0;
        }
        // Si el acceso está inactivo, lo activamos cambiando su estado a 1
        else {
            $tarjetas->eliminado = 1;
        }
        $tarjetas->save();
        return redirect('/tarjetas');

    
    

    }
}