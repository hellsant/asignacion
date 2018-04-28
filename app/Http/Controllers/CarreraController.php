<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('carreras')->get();
        return view('carrera.lista',['carreras'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrera.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('carreras')
        ->insertGetId([
            'COD_CARRERA'=> $request->COD_CARRERA,
            'NOM_CARRERA'=>$request->NOM_CARRERA
            ]);
        return redirect('carrera');
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
        $carrera = DB::table('carreras')
        ->where('carreras.id',$id)
        ->first();
        return view('carrera.edit',[
            'carrera'=>$carrera
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
        $carrera = DB::table('carreras')
        ->where('carreras.id',$id)
        ->update([
            'COD_CARRERA'=> $request->COD_CARRERA,
            'NOM_CARRERA'=>$request->NOM_CARRERA
        ]);
        return redirect('carrera');
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
