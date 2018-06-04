<?php

namespace App\Http\Controllers;
use App\Tribunal;
use App\Proyecto;
use App\Profesional;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        return redirect('proyecto');

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
    public function registrar($proyectoid)
    {
        $now=Carbon::now();
       
        $proyectos = Proyecto::findOrFail($proyectoid);

        $estudiantes = $proyectos->estudiante->each(function($estudiante){
            $estudiante->estudiante;
        });
        $areas = $proyectos->area->each(function($area){
            $area->profesional->each(function($area){
                $area->profesional;
            });
        });
        $subareas=$proyectos->subarea->each(function($subarea){
            $subarea->profesional;
        });
        
        $querytutor=DB::select( 
        'SELECT profesional.id,COUNT(estudiante_profesionals.id) tutor 
         FROM profesional 
         INNER JOIN estudiante_profesionals ON estudiante_profesionals.profesional_id=profesional.id 
         GROUP BY profesional.id');

        $querytribunal=DB::select(
        'SELECT profesional.id, COUNT(motivo_profesional_proyecto.profesional_id) tribunal 
        FROM profesional 
        INNER JOIN motivo_profesional_proyecto ON motivo_profesional_proyecto.profesional_id=profesional.id 
        GROUP BY profesional.id');

        $tutores = Collection::make($querytutor);
        $tribunalesN = Collection::make($querytribunal);
        
        return view('tribunal.asignacion')->with(compact('tribunales','subareas','areas','now','proyectos','estudiantes','tutores','tribunalesN'));  
    }

}
