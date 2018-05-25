<?php

namespace App\Http\Controllers;
use App\Profesional;
use App\Titulo;
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
        $profesionales = Profesional::all();
        $titulos= Titulo::all();
        //foreach ($data as $key) {
        //   $titulo = Titulo::findOrFail($key->titulo_id)->profesional();
        //  dd($titulo);
        //}
        return view('profesional.lista')->with(compact('profesionales','titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = Titulo::pluck('nombre','id');
        return view('profesional.registrar')->with(compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $p=Profesional::where('CI_PROF','=',$request->CI_PROF)->first();
        if($p==null)
        {
            $profesional= new Profesional;
            $profesional-> NOM_PROF=$request->NOM_PROF;
            $profesional-> AP_PAT_PROF=$request->AP_PAT_PROF;
            $profesional-> AP_MAT_PROF=$request->AP_MAT_PROF;
            $profesional-> titulo_id=$request->TITULO_PROF;
            $profesional-> TELF_PROF=$request->TELF_PROF;
            $profesional-> CI_PROF=$request->CI_PROF;
            $profesional-> Tipo=$request->Tipo;
            $profesional-> CORREO_PROF=$request->CORREO_PROF;
        //    dd($profesional);
        $profesional->save();
            return redirect('profesional');
        }
        else
        {
            return redirect('profesional');
        }
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

        $profesional = Profesional::findOrFail($id);
        $tituloNombre = Titulo::findOrFail($profesional->titulo_id)->nombre;
        $titulo= Titulo::pluck('nombre','id');
        return view('profesional.edit')->with(compact('profesional','tituloNombre','titulo'));
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
      $profesional=Profesional::find($id);
      $profesional->NOM_PROF=$request->NOM_PROF;
      $profesional->AP_PAT_PROF=$request->AP_PAT_PROF;
      $profesional->AP_MAT_PROF=$request->AP_MAT_PROF;
      $profesional->titulo_id=$request->TITULO_PROF;
      $profesional->TELF_PROF=$request->TELF_PROF;
      $profesional->CI_PROF=$request->CI_PROF;
      $profesional->Tipo=$request->Tipo;
      $profesional->CORREO_PROF=$request->CORREO_PROF;
      $profesional->save();
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
        Profesional::findOrFail($id)->delete();
        return redirect('profesional');
    }

    public function ocultar($id)
    {
        Profesional::findOrFail($id)->delete();
        return redirect('profesional');
    }
}
