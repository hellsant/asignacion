<?php

namespace App\Http\Controllers;
use App\Tribunal;
use App\Proyecto;
use App\Profesional;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Gestion;
use App\Estudiante;
use App\Area;
use App\SubArea;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
class TribunalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelo = collect();   
        $proyectos= Proyecto::all();
        $estudianteArray= array();
        $proyectoArray= array();
        $tribunalArray=array();
        foreach ($proyectos as $p => $proyecto) {
            array_push($proyectoArray,$proyecto);
            $estudiantes = $proyecto->estudiante;
            foreach($estudiantes as $estudiante){
                array_push($estudianteArray,$estudiante);
            }
            $tribunales = Proyecto::findOrFail($proyecto->id)->profesional;
            foreach($tribunales as $tribual){
                array_push($tribunalArray,$tribual);
            }
           
        }     
        $ultimo =array_merge($estudianteArray,$proyectoArray, $tribunalArray);
        ($ultimo);
        $tribunales = Collection::make($modelo);
        return view('tribunal.lista')->with(compact('estudianteArray','proyectoArray','tribunalArray','ultimo'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proyecto::findOrFail($request->id_perfil)->update($request->all());
        $proyecto = Proyecto::findOrFail($request->id_perfil);
        foreach ($request->input("docenteTrinunal") as $tribunal){
            $proyecto->profesional()->attach($tribunal,['motivo_id' => 1,'proyecto_id'=>$request->id_perfil]);
        }
        return redirect('tribunal');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }

    /**
     * registra los tribuinales a los cuales pueden ser elegidos.
     */
    public function registrar($estudianteId)
    {
        $now=Carbon::now();
        $proyectos = Estudiante::findOrFail($estudianteId)->proyectos;
        $nom = Estudiante::findOrFail($estudianteId)->NOM_EST;
        $apest = Estudiante::findOrFail($estudianteId)->AP_PAT_EST;
        $maest = Estudiante::findOrFail($estudianteId)->AP_MAT_EST;
        $estudiante = "$nom $apest $maest";
        $tribunales =Profesional::paginate(10);
        $nombreArea="";
        $nombreSubarea=[];
        foreach ($proyectos as $proyecto) {
            $areas = Proyecto::findOrFail($proyecto->id)->area;
            $subAreas = Proyecto::findOrFail($proyecto->id)->subarea;
            foreach ($areas as $area) {
                $nombreArea=$area->NOMBRE_AREA;
            }
            foreach ($subAreas as $subArea) {
                array_push($nombreSubarea, $subArea->NOM_SUBAREA);
            }
        }
        return view('tribunal.asignacion')->with(compact('tribunales','now','proyectos','estudiante','nombreArea','nombreSubarea'));  
    }
    
}
