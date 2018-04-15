<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfecionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('profecional')->get();
        return view('profecional.lista',['profecionales'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profecional.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('profecional')
        ->insertGetId([
            'COD_PROF'=>$request->COD_PROF,
            'NOM_PROF'=> $request->NOM_PROF,
            'AP_PAT_PROF'=>$request->AP_PAT_PROF,
            'AP_MAT_PROF'=>$request->AP_MAT_PROF,
            'TITULO_PROF'=>$request->TITULO_PROF,
            'TELF_PROF'=>$request->TELF_PROF,
            'DIREC_PROF'=>$request->DIREC_PROF,
            'CI_PROF'=>$request->CI_PROF,
            'COD_SIS_PROF'=>$request->COD_SIS_PROF,
            'Tipo'=>$request->Tipo,
            'CORREO_PROF'=>$request->CORREO_PROF
            ]);
        return redirect('profecional');
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
        $profecional = DB::table('profecional')
        ->where('profecional.id',$id)
        ->first();
        return view('profecional.edit',[
            'profecional'=>$profecional
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
        $profecional = DB::table('profecional')
        ->where('profecional.id',$id)
        ->update([
            'COD_PROF'=>$request->COD_PROF,
            'NOM_PROF'=> $request->NOM_PROF,
            'AP_PAT_PROF'=>$request->AP_PAT_PROF,
            'AP_MAT_PROF'=>$request->AP_MAT_PROF,
            'TITULO_PROF'=>$request->TITULO_PROF,
            'TELF_PROF'=>$request->TELF_PROF,
            'DIREC_PROF'=>$request->DIREC_PROF,
            'CI_PROF'=>$request->CI_PROF,
            'COD_SIS_PROF'=>$request->COD_SIS_PROF,
            'Tipo'=>$request->Tipo,
            'CORREO_PROF'=>$request->CORREO_PROF
        ]);
        return redirect('profecional');
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
