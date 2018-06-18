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
use App\Motivo;
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
         INNER JOIN estudiantes ON estudiante_profesionals.estudiante_id=estudiantes.id
         INNER JOIN estudiante_proyecto ON estudiante_proyecto.estudiante_id=estudiantes.id
         INNER JOIN proyectos ON estudiante_proyecto.proyecto_id=proyectos.id WHERE proyectos.CICLO="en progreso"
         GROUP BY profesional.id');

        $querytribunal=DB::select(
          'SELECT profesional.id, COUNT(motivo_profesional_proyecto.profesional_id) tribunal
          FROM profesional
          INNER JOIN motivo_profesional_proyecto ON motivo_profesional_proyecto.profesional_id=profesional.id
          INNER JOIN proyectos ON motivo_profesional_proyecto.proyecto_id=proyectos.id
          WHERE motivo_profesional_proyecto.deleted_at IS null AND motivo_profesional_proyecto.motivo_id=1 AND proyectos.CICLO="en progreso"
          GROUP BY profesional.id');

        $tutores = Collection::make($querytutor);
        $tribunalesN = Collection::make($querytribunal);

        return view('tribunal.asignacion')->with(compact('tribunales','subareas','areas','now','proyectos','estudiantes','tutores','tribunalesN'));
    }

    public function listaTutores($id)
    {
        $profesional = Profesional::findOrFail($id);
        $estudiantes = $profesional->estudiante->each(function($estudiante){
            $estudiante->proyectos->each(function ($estudiante){
                $estudiante->proyectos;
            });
        });
        $areas = $profesional->area->each(function($area){
            $area->profesional->each(function($area){
                $area->profesional;
            });
        });
        $subareas=$profesional->subarea->each(function($subarea){
            $subarea->profesional;
        });

        return view('tribunal.listaTutores')->with(compact('profesional','estudiantes', 'areas', 'subareas'));
    }

    public function reasignar($tribunalId,$proyectoid)
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
         INNER JOIN estudiantes ON estudiante_profesionals.estudiante_id=estudiantes.id
         INNER JOIN estudiante_proyecto ON estudiante_proyecto.estudiante_id=estudiantes.id
         INNER JOIN proyectos ON estudiante_proyecto.proyecto_id=proyectos.id WHERE proyectos.CICLO="en progreso"
         GROUP BY profesional.id');

        $querytribunal=DB::select(
        'SELECT profesional.id, COUNT(motivo_profesional_proyecto.profesional_id) tribunal
        FROM profesional
        INNER JOIN motivo_profesional_proyecto ON motivo_profesional_proyecto.profesional_id=profesional.id
        INNER JOIN proyectos ON motivo_profesional_proyecto.proyecto_id=proyectos.id
        WHERE motivo_profesional_proyecto.deleted_at IS null AND motivo_profesional_proyecto.motivo_id=1 AND proyectos.CICLO="en progreso"
        GROUP BY profesional.id');

        $tutores = Collection::make($querytutor);
        $tribunalesN = Collection::make($querytribunal);

        return view('tribunal.reasignacion')->with(compact('tribunales','subareas','areas','now','proyectos','estudiantes','tutores','tribunalesN','tribunalId'));
    }

    public function listaReasignar($id)
    {
        $profesional = Profesional::findOrFail($id);
        $proyectos = $profesional->proyecto->each(function($proyecto)
        {
            $proyecto->proyecto;
        });
        $areas = $profesional->area->each(function($area){
            $area->profesional->each(function($area){
                $area->profesional;
            });
        });
        $subareas=$profesional->subarea->each(function($subarea){
            $subarea->profesional;
        });

        return view('tribunal.listaTibunales')->with(compact('profesional','proyectos', 'areas', 'subareas'));
    }


    public function cambiar($idprofesional,$idproyecto)
    {
        $profesional = Profesional::findOrFail($idprofesional);
        $proyecto = Proyecto::findOrFail($idproyecto);
        $motivos= Motivo::pluck('NOM_MOT', 'id');
        return view('tribunal.retirar')->with(compact('profesional','proyecto', 'motivos'));
    }

    public function retirar(Request $request, $idprofesional,$idproyecto)
    {
        Proyecto::findOrFail($idproyecto)->profesional()->detach($idprofesional,['motivo_id' => 1,'proyecto_id'=>$idproyecto]);

        Proyecto::findOrFail($idproyecto)->profesional()->attach($idprofesional,['motivo_id' => $request->motivo,'proyecto_id'=>$idproyecto, 'DESCRIPCION'=>$request->descripcion]);
        return redirect()->route('tribunal.reasignar', ['idprofesional' => $idprofesional,'idproyecto'=>$idproyecto]);
    }
}
