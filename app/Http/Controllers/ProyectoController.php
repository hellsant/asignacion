<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\Modalidades;
use App\Gestion;
use App\Estudiante;
use App\Profesional;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $proyectos = Proyecto::Nombre($request->nombre)->orderBy('GESTION_LIMITE', 'DESC')->paginate(20);
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
        $gestiones= Gestion::pluck('FECHA_INI', 'PERIODO', 'id');
        $estudiantes= Estudiante::pluck('COD_SIS', 'id');
        $tutores= Profesional::pluck('NOM_PROF', 'AP_PAT_PROF', 'AP_MAT_PROF', 'id');
        //$gestionRegistro=$this->calcularGestion($now);
        $modalidades=Modalidades::pluck('NOM','id');
        return view('proyecto.registrar')->with(compact('modalidades','now','gestiones','estudiantes', 'tutores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(($request->FECHA_INI>$request->FECHA_REGISTRO)||($request->FECHA_INI==null))
        {
            if(($request->FECHA_DEF>$request->FECHA_LIMITE)||($request->FECHA_DEF==null))
            {
                $proyecto = new Proyecto;
                $proyecto->TITULO_PERFIL= $request->TITULO_PERFIL;
                $proyecto->FECHA_REGISTRO=$request->FECHA_REGISTRO;
                $proyecto->GESTION_REGISTRO=$request->GESTION_REGISTRO;
                $proyecto->GESTION_LIMITE=$request->GESTION_LIMITE;
                $proyecto->OBJ_GRAL=$request->OBJ_GRAL;
                $proyecto->OBJ_ESP=$request->OBJ_ESP;
                $proyecto->DESCRIPCION=$request->DESCRIPCION;
                $proyecto->FECHA_INI=$request->FECHA_INI;
                $proyecto->FECHA_DEF=$request->FECHA_DEF;
                $proyecto->modalidad_id=$request->MODALIDAD;
                $proyecto->save();
                return redirect('proyecto');
            }
            else
            {
                return redirect('proyecto');
            }
        }
        else
        {
            return redirect('proyecto');
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
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->modalidad;
        return view('proyecto.edit')->with(compact('proyecto'));
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
        if($request->FECHA_PRORR>$request->FECHA_LIMITE)
        {
            Proyecto::findOrFail($id)->update($request->all());
            return redirect('proyecto');
        }
        else
        {
            return redirect('proyecto');
        }
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

    public function calcularGestion($now)
    {
        $seleccionado = Gestion::whereYear('FECHA_INI',$now)->get();
        $gestiones=array();
        foreach ($seleccionado as $value) {
            $periodo=$value->PERIODO;
            $año=$value->FECHA_INI + 0;
            $str="$periodo - $año";
            $gestiones = $this->array_push_assoc($gestiones, $str, $str);
        }
        return $gestiones;
    }

    public function calcularGestionLimite($now)
    {
        $seleccionado = Gestion::whereYear('FECHA_INI',$now)->get();
        $gestiones=array();
        foreach ($seleccionado as $value) {
            $periodo=$value->PERIODO;
            $año = $value->FECHA_INI + 2;
            $str = "$periodo - $año";
            $gestiones = $this->array_push_assoc($gestiones, $str, $str);
        }
        return $gestiones;
    }
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
        }
}
