<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('estudiantes')->get();
        return view('estudiante.lista',['estudiantes'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('estudiantes')
        ->insertGetId([
            'COD_SIS'=> $request->COD_SIS,
            'NOM_EST'=>$request->NOM_EST,
            'AP_PAT_EST'=>$request->AP_PAT_EST,
            'AP_MAT_EST'=>$request->AP_MAT_EST,
            'CI'=>$request->CI,
            'TEL'=>$request->TEL,
            'CORRETO_EST'=>$request->CORRETO_EST
            ]);
        return redirect('estudiante');
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
        $estudiante = DB::table('estudiantes')
        ->where('estudiantes.id',$id)
        ->first();
        return view('estudiante.edit',[
            'estudiante'=>$estudiante
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
        $estudiante = DB::table('estudiantes')
        ->where('estudiantes.id',$id)
        ->update([
            'COD_SIS'=> $request->COD_SIS,
            'NOM_EST'=>$request->NOM_EST,
            'AP_PAT_EST'=>$request->AP_PAT_EST,
            'AP_MAT_EST'=>$request->AP_MAT_EST,
            'CI'=>$request->CI,
            'TEL'=>$request->TEL,
            'CORRETO_EST'=>$request->CORRETO_EST,
        ]);
        return redirect('estudiante');
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
