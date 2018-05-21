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
use DB;
class TribunalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$modelo = collect();   
        //$proyectos= Proyecto::all();
        //$estudianteArray= array();
        //$proyectoArray= array();
        //$tribunalArray=array();
        //foreach ($proyectos as $p => $proyecto) {
        //    array_push($proyectoArray,$proyecto);
        //    $estudiantes = $proyecto->estudiante;
        //    foreach($estudiantes as $estudiante){
        //        array_push($estudianteArray,$estudiante);
        //    }
        //    $tribunales = Proyecto::findOrFail($proyecto->id)->profesional;
        //    foreach($tribunales as $tribual){
        //        array_push($tribunalArray,$tribual);
        //    }
        //   
        //}     
        //$ultimo =array_merge($estudianteArray,$proyectoArray, $tribunalArray);
        //$tribunales = Collection::make($modelo);

        $tesis=DB::select(
            'SELECT estudiantes.id, estudiantes.NOM_EST nombre, estudiantes.AP_PAT_EST apellidoP, estudiantes.AP_MAT_EST apellidoM, proyectos.TITULO_PERFIL, proyectos.FECHA_REGISTRO, proyectos.FECHA_INI, proyectos.FECHA_DEF, proyectos.GESTION_PRORROGA 
            FROM estudiantes 
            INNER JOIN estudiante_proyecto ON estudiantes.id=estudiante_proyecto.estudiante_id 
            INNER JOIN proyectos ON proyectos.id=estudiante_proyecto.proyecto_id 
            ORDER BY estudiantes.id');

        $tribunal=DB::select(
            'SELECT estudiantes.id id_est, profesional.NOM_PROF, profesional.AP_PAT_PROF, profesional.AP_MAT_PROF 
            FROM proyectos 
            INNER JOIN motivo_profesional_proyecto ON proyectos.id=motivo_profesional_proyecto.proyecto_id 
            INNER JOIN profesional ON motivo_profesional_proyecto.profesional_id=profesional.id 
            INNER JOIN estudiante_proyecto ON proyectos.id=estudiante_proyecto.proyecto_id 
            INNER JOIN estudiantes ON estudiante_proyecto.estudiante_id=estudiantes.id 
            ORDER BY estudiantes.id');
            $tribunales = Collection::make($tribunal);
            $proyectos = Collection::make($tesis);
        return view('tribunal.lista')->with(compact('tribunales','proyectos'));  
        //return view('tribunal.lista')->with(compact('estudianteArray','proyectoArray','tribunalArray','ultimo'));  
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
        $nombreModalidad="";
        foreach ($proyectos as $proyecto) {
            $areas = Proyecto::findOrFail($proyecto->id)->area;
            $subAreas = Proyecto::findOrFail($proyecto->id)->subarea;
            $nombreModalidad = Proyecto::findOrFail($proyecto->id)->modalidad->NOM;
               
            foreach ($areas as $area) {
                $nombreArea=$area->NOMBRE_AREA;
            }
            foreach ($subAreas as $subArea) {
                array_push($nombreSubarea, $subArea->NOM_SUBAREA);
            }
        }
        
        $querytutor=DB::select( 
        'SELECT profesional.id, profesional.NOM_PROF nombre, profesional.AP_PAT_PROF apellidoP, profesional.AP_MAT_PROF apellidoM, COUNT(estudiante_profesionals.id) tutor 
         FROM profesional 
         INNER JOIN estudiante_profesionals ON estudiante_profesionals.profesional_id=profesional.id 
         GROUP BY profesional.id');
        
        $querytribunal=DB::select(
        'SELECT profesional.id, profesional.NOM_PROF nombre, profesional.AP_PAT_PROF apellidoP, profesional.AP_MAT_PROF apellidoM, COUNT(motivo_profesional_proyecto.profesional_id) tribunal 
        FROM profesional 
        INNER JOIN motivo_profesional_proyecto ON motivo_profesional_proyecto.profesional_id=profesional.id 
        GROUP BY profesional.id');
      
        $tutores = Collection::make($querytutor);
        $tribunalesN = Collection::make($querytribunal);
        
        return view('tribunal.asignacion')->with(compact('nombreModalidad','tribunales','now','proyectos','estudiante','nombreArea','nombreSubarea','tutores','tribunalesN'));  
    }
    
}
