<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\Modalidades;
use Illuminate\Http\Request;
use DB;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyecto.lista')->with(compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mod=Modalidades::all();
        $listaMonbres=array();
        foreach ($mod as $modalidad){
            array_push($listaMonbres,$modalidad->NOM);
        }
        return view('proyecto.registrar')->with(compact('listaMonbres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->FECHA_LIMITE>$request->FECHA_REGISTRO)
        {
            if(($request->FECHA_INI>$request->FECHA_REGISTRO)||($request->FECHA_INI==null))
            {
                if(($request->FECHA_DEF>$request->FECHA_LIMITE)||($request->FECHA_DEF==null))
                {
                    $proyecto = new Proyecto;
                    $proyecto->TITULO_PERFIL= $request->TITULO_PERFIL;
                    $proyecto->FECHA_REGISTRO=$request->FECHA_REGISTRO;
                    $proyecto->FECHA_LIMITE=$request->FECHA_LIMITE;
                    $proyecto->OBJ_GRAL=$request->OBJ_GRAL;
                    $proyecto->OBJ_ESP=$request->OBJ_ESP;
                    $proyecto->DESCRIPCION=$request->DESCRIPCION;
                    $proyecto->FECHA_INI=$request->FECHA_INI;
                    $proyecto->FECHA_DEF=$request->FECHA_DEF;
                    $proyecto->FECHA_PRORR=$request->FECHA_PRORR;
                    $proyecto->modalidad_id=$request->MODALIDAD+1;
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
}
