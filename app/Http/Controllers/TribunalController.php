<?php

namespace App\Http\Controllers;
use App\Tribunal;
use App\Proyecto;
use App\Profesional;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Gestion;
use App\Estudiante;
class TribunalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tribunales = [];
        $now=Carbon::now();
        $gestion = $this->calcularGestion($now);
        $gestionLimite= $this->calcularGestionLimite($now);
        $estudiante = Proyecto::find(1)->estudiante;
        $proyecto = Estudiante::find(800)->proyectos;
        echo($estudiante);
        echo($proyecto);
        $proyectos=Proyecto::find(1)->profesional;
        echo($proyectos);
        return view('tribunal.asignacion')->with(compact('tribunales','now','gestion','gestionLimite'));  
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
        //
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
    public function registrar($id)
    {
        $tribunales = [];
        $now=Carbon::now();
        $gestion = $this->calcularGestion($now);
        $gestionLimite= $this->calcularGestionLimite($now);
        $estudiante = Proyecto::find($id)->estudiante;
        $proyecto = Estudiante::find(800)->proyectos;
        echo($estudiante);
        echo($proyecto);
        $proyectos=Proyecto::find($id)->profesional;
        echo($proyectos);
        return view('tribunal.asignacion')->with(compact('tribunales','now','gestion','gestionLimite'));  
    }

    public function calcularGestion($now)
    {
        $seleccionado = Gestion::whereYear('FECHA_INI',$now)->get();
        $gestiones=array();
        foreach ($seleccionado as $value) {
            $periodo=$value->PERIODO;
            $año=$value->FECHA_INI + 0;
            $str="$periodo - $año";
            array_push($gestiones,$str);            
        }
        return $gestiones;
    }
   
    public function calcularGestionLimite($now)
    {
        $seleccionado = Gestion::whereYear('FECHA_INI',$now)->get();
        $gestiones=array();
        foreach ($seleccionado as $value) {
            $periodo=$value->PERIODO;
            $año=$value->FECHA_INI + 2;
            $str="$periodo - $año";
            array_push($gestiones,$str);            
        }
        return $gestiones;
    }

}
