<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('docentes')->get();
        return view('docente.lista',['docentes'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = DB::table('docentes')
        ->insertGetId([
            'nombre'=> $request->nombre,
            'apellidopaterno'=>$request->apellidopaterno,
            'apellidomaterno'=>$request->apellidomaterno,
            'titulodocente'=>$request->titulodocente,
            'cargahoraria'=>$request->cargahoraria,
            'telefono'=>$request->telefono,
            'correo'=>$request->correo
        ]);
        return redirect('docente');
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
        $docente = DB::table('docentes')
        ->where('docentes.id',$id)
        ->first();
        return view('docente.edit',[
            'docente'=>$docente
        ]);
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
        $docente = DB::table('docentes')
        ->where('docentes.id',$id)
        ->update([
            'nombre'=> $request->nombre,
            'apellidopaterno'=>$request->apellidopaterno,
            'apellidomaterno'=>$request->apellidomaterno,
            'titulodocente'=>$request->titulodocente,
            'cargahoraria'=>$request->cargahoraria,
            'telefono'=>$request->telefono,
            'correo'=>$request->correo
        ]);
        return redirect('docente');
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
