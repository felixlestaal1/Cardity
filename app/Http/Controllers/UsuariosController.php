<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\usuarios;


class UsuariosController extends Controller
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
        $usuarios = usuarios::all();
        return view('usuario.index')->with('usuarios',$usuarios);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new areas();
        $usuarios->nombre = $request->get('nombre');
        $usuarios->apellido = $request->get('apellido');
        $usuarios->numero_de_empleado = $request->get('numero_de_empleado');
        $usuarios->id_tarjeta = $request->get('id_tarjeta');
        $usuarios->activo_inactivo = $request->get('activo_inactivo');
        $usuarios->eliminado = $request->get('eliminado');
        $usuarios->save();
        return redirect('/usuarios');
 
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
        $usuario = usuarios::find($id);
        return view('usuario.edit')->with('usuario',$usuario);


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
        $usuarios = usuarios::find($id);
        $usuarios->nombre = $request->get('nombre');
        $usuarios->apellido = $request->get('apellido');
        $usuarios->numero_de_empleado = $request->get('numero_de_empleado');
        $usuarios->id_tarjeta = $request->get('id_tarjeta');
        $usuarios->activo_inactivo = $request->get('activo_inactivo');
        $usuarios->eliminado = $request->get('eliminado');
        $usuarios->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = usuarios::find($id);

        // Si el acceso está activo, lo desactivamos cambiando su estado a 0
        if ($usuarios->eliminado == 1) {
            $usuarios->eliminado = 0;
        }
        // Si el acceso está inactivo, lo activamos cambiando su estado a 1
        else {
            $usuarios->eliminado = 1;
        }
        $usuarios->save();
        return redirect('/usuarios');

    }
}