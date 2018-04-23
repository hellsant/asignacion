<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('profesional')->get();
        return view('profesional.lista',['profesionales'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesional.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('profesional')
        ->insertGetId([
            'NOM_PROF'=> $request->NOM_PROF,
            'AP_PAT_PROF'=>$request->AP_PAT_PROF,
            'AP_MAT_PROF'=>$request->AP_MAT_PROF,
            'TITULO_PROF'=>$request->TITULO_PROF,
            'TELF_PROF'=>$request->TELF_PROF,
            'CI_PROF'=>$request->CI_PROF,
            'MON_CUENTA'=>$request->MON_CUENTA,
            'Tipo'=>$request->Tipo,
            'CORREO_PROF'=>$request->CORREO_PROF
            ]);
        return redirect('profesional');
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
        $profesional = DB::table('profesional')
        ->where('profesional.id',$id)
        ->first();
        return view('profesional.edit',[
            'profesional'=>$profesional
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
        $profesional = DB::table('profesional')
        ->where('profesional.id',$id)
        ->update([
            'NOM_PROF'=> $request->NOM_PROF,
            'AP_PAT_PROF'=>$request->AP_PAT_PROF,
            'AP_MAT_PROF'=>$request->AP_MAT_PROF,
            'TITULO_PROF'=>$request->TITULO_PROF,
            'TELF_PROF'=>$request->TELF_PROF,
            'CI_PROF'=>$request->CI_PROF,
            'MON_CUENTA'=>$request->MON_CUENTA,
            'Tipo'=>$request->Tipo,
            'CORREO_PROF'=>$request->CORREO_PROF
        ]);
        return redirect('profesional');
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
