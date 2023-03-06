<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\areas;


class AreaController extends Controller
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
        $areas = areas::all();
        return view('area.index')->with('areas',$areas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('area.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $areas = new areas();
        $areas->nombre = $request->get('nombre');
        $areas->eliminado = $request->get('eliminado');
        $areas->save();
        return redirect('/areas');
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
        $area = areas::find($id);
        return view('area.edit')->with('area',$area);

  

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
        $areas = areas::find($id);
        $areas->nombre = $request->get('nombre');
        $areas->eliminado = $request->get('eliminado');
        $areas->save();
        return redirect('/areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areas = areas::find($id);

        // Si el acceso está activo, lo desactivamos cambiando su estado a 0
        if ($areas->eliminado == 1) {
            $areas->eliminado = 0;
        }
        // Si el acceso está inactivo, lo activamos cambiando su estado a 1
        else {
            $areas->eliminado = 1;
        }
    
        $areas->save();
        return redirect('/areas');

    }
}