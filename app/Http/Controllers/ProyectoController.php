<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\Modalidades;
use App\Gestion;
use App\Estudiante;
use App\Profesional;
use App\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilesFormRequest;

use DB;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proyectos = Proyecto::all();
<<<<<<< HEAD

=======

>>>>>>> 416f0fd0d1ad64fe7edeccbd43b857f32ece506c
         //$nombre = $request->busqueda;
         // $proyectos = Proyecto::orderBy('id', 'DESC');
         //   ->where("TITULO_PERFIL", "LIKE", "%$nombre%")
         //   ->orWhere("proyectos.id", "LIKE", "%$nombre%")
         //   ->orWhereHas('estudiante', function ($query) use ($nombre) {
         //           $query->where('NOM_EST', 'LIKE', "%$nombre%")
         //           ->orWhere("AP_PAT_EST", "LIKE", "%$nombre%")
         //           ->orWhere("AP_MAT_EST", "LIKE", "%$nombre%")
         //           ->orWhereHas('profesional', function($query) use ($nombre){
         //               $query->Where("NOM_PROF", "LIKE", "%$nombre%")
         //               ->orWhere("AP_PAT_PROF", "LIKE", "%$nombre%")
         //               ->orWhere("AP_MAT_PROF", "LIKE", "%$nombre%");
         //       });
         //   })
         //   ->orWhereHas('profesional', function($query) use ($nombre){
         //           $query->Where("NOM_PROF", "LIKE", "%$nombre%")
         //           ->orWhere("AP_PAT_PROF", "LIKE", "%$nombre%")
         //           ->orWhere("AP_MAT_PROF", "LIKE", "%$nombre%");
         //       })
         //   ->paginate(10);


        return view('proyecto.lista')->with(compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $now = Carbon::now();
        $gestiones= Gestion::select(DB::raw('CONCAT(PERIODO,"-",YEAR(FECHA_INI)) as periodo_fecha'))
        ->pluck('periodo_fecha', 'periodo_fecha');
        $modalidades=Modalidades::pluck('NOM','id');
        $estudiantes= Estudiante::select(DB::raw('CONCAT(AP_PAT_EST, " ", AP_MAT_EST, " ", NOM_EST) as nombre_completo'), 'id')
        ->orderBy('AP_PAT_EST')
        ->pluck('nombre_completo', 'id');

        $tutores= Profesional::select(DB::raw('CONCAT(AP_PAT_PROF, " ", AP_MAT_PROF, " ", NOM_PROF) as nombre_completo'), 'id')
        ->orderBy('AP_PAT_PROF')
        ->pluck('nombre_completo', 'id');
        $areas= Area::pluck('NOMBRE_AREA', 'id');
        return view('proyecto.registrar')->with(compact('modalidades','now','gestiones', 'estudiantes', 'tutores', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilesFormRequest $request)
    {
        $proyecto = new Proyecto;
        $proyecto->TITULO_PERFIL= $request->titulo;
        $proyecto->FECHA_REGISTRO=$request->fecha_registro;
        $proyecto->GESTION_REGISTRO=$request->gestion_registro;
        $proyecto->GESTION_LIMITE=$request->gestion_limite;
        $proyecto->OBJ_GRAL=$request->objetivo_general;
        $proyecto->OBJ_ESP=$request->objetivos_especificos;
        $proyecto->DESCRIPCION=$request->descripcion;
        $proyecto->FECHA_INI=$request->fecha_inicio;
        $proyecto->FECHA_DEF=$request->fecha_defensa;
        $proyecto->modalidad_id=$request->modalidad;
        $proyecto->CICLO='en progreso';
        $proyecto->save();

        $estudiante= Estudiante::find($request->estudiante);
        $estudiante->profesional()->attach($request->tutor);

        $perfil= Proyecto::all()->last();
        $perfil->estudiante()->attach($request->estudiante);
        $perfil->area()->attach($request->area);

        return redirect('proyecto');
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
        $proyecto = Proyecto::findOrFail($id);
        $now = Carbon::now();
        $gestiones= Gestion::select(DB::raw('CONCAT(PERIODO,"-",YEAR(FECHA_INI)) as periodo_fecha'))
        ->pluck('periodo_fecha', 'periodo_fecha');
        $modalidades=Modalidades::pluck('NOM','id');
        return view('proyecto.edit')->with(compact('proyecto','now','gestiones', 'modalidades'));
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

            $proyecto=Proyecto::find($id);

              $proyecto->TITULO_PERFIL= $request->titulo;
              $proyecto->FECHA_REGISTRO=$request->fecha_registro;
              $proyecto->GESTION_REGISTRO=$request->gestion_registro;
              $proyecto->GESTION_LIMITE=$request->gestion_limite;
              $proyecto->OBJ_GRAL=$request->objetivo_general;
              $proyecto->OBJ_ESP=$request->objetivos_especificos;
              $proyecto->DESCRIPCION=$request->descripcion;
              $proyecto->FECHA_INI=$request->fecha_inicio;
              $proyecto->FECHA_DEF=$request->fecha_defensa;
              $proyecto->modalidad_id=$request->modalidad;

            $proyecto->save();
            return redirect('proyecto');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::findOrFail($id)->delete();
        return redirect('proyecto');
    }

    public function ocultar($id)
    {
        Proyecto::findOrFail($id)->delete();
        return redirect('proyecto');
    }

    public function tutor($id){

      $estudiantes= Estudiante::select(DB::raw('CONCAT(AP_PAT_EST, " ", AP_MAT_EST, " ", NOM_EST) as nombre_completo'), 'id')
      ->orderBy('AP_PAT_EST')
      ->pluck('nombre_completo', 'id');

      $tutores= Profesional::select(DB::raw('CONCAT(AP_PAT_PROF, " ", AP_MAT_PROF, " ", NOM_PROF) as nombre_completo'), 'id')
      ->orderBy('AP_PAT_PROF')
      ->pluck('nombre_completo', 'id');

      $proyecto= Proyecto::findOrFail($id);

      return view('tutor.registrar')->with(compact('estudiantes', 'tutores', 'proyecto'));
    }

    public function finalizar($id){
        $proyectos = Proyecto::findOrFail($id);
        $estudiante= $proyectos->estudiante;
        return view('ciclo.culminarCiclo')->with(compact('proyectos','estudiante'));
    }

    public function terminarCiclo(Request $request,$id)
    {
        $proyectos = Proyecto::findOrFail($id);
        $proyectos ->CICLO=$request->CICLO;
        $proyectos->save();
        return redirect('proyecto');
    }

    public function proyectosCulminados(Request $request){

        $proyectos = Proyecto::all();
        return view('proyecto.listaCulminados')->with(compact('proyectos'));
    }
}
