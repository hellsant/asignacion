<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Subarea;
use App\Area;
use App\Profesional;
class SubareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subareas = Subarea::all();
        return view('subarea.lista')->with(compact('subareas'));
    }

    public function indexProfesionales(Request $request, Subarea $s)
    {
        $subarea=Subarea::findOrFail($s->id);
        // dd($subarea);
        return view('subarea.profesionales')->with(compact('subarea', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subarea.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Area $area)
    {
      //$area=Area::findOrFail($area);
      $subarea=new Subarea;

      $subarea->NOMBRE_SUBAREA=$request->nombre;
      $subarea->DESC_SUBAREA=$request->descripcion;
      $subarea->area_id=$area->id;
      $subarea->save();
        return redirect('subarea');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subarea = Subarea::findOrFail($id);
        return view('subarea.edit')->with(compact('subarea'));
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
      //dd($request->descripcion);
      $subarea=Subarea::findOrFail($id);
      $subarea->NOMBRE_SUBAREA=$request->nombre;
      $subarea->DESC_SUBAREA=$request->descripcion;
      $subarea->save();
        return redirect('subarea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subarea::findOrFail($id)->delete();
        return redirect('subarea');
    }

    public function recibe(Request $request,$area)
    {
        $a= Area::findOrFail($area);
        return view('subarea.registrar')->with(compact('a'));
    }

    public function ocultar($id)
    {
        Subarea::findOrFail($id)->delete();
        return redirect('subarea');
    }
    public function ocultarProfesional($idprofesional,$idsubarea)
    {

        $profesional=Profesional::find($idprofesional);

        $profesional->subarea()->detach($idsubarea);

        return redirect('subarea');
    }
}
