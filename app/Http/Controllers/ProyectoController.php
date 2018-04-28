<?php

namespace App\Http\Controllers;

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
        $data = DB::table('proyectos')
        ->join('modalidades','proyectos.modalidad_id','=','modalidades.id')
        ->get();
        return view('proyecto.lista',['proyectos'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mod=DB::table('modalidades')->get();
        $listaMonbres=array();
        foreach ($mod as $modalidad){
            array_push($listaMonbres,$modalidad->NOM);
        }
        return view('proyecto.registrar',['listaMonbres'=>$listaMonbres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mod=DB::table('modalidades')
        ->where('id',$request->MODALIDAD+1)
        ->value('id');
        $idP = DB::table('proyectos')
        ->insertGetId([
            'TITULO_PERFIL'=> $request->TITULO_PERFIL,
            'FECHA_REGISTRO'=>$request->FECHA_REGISTRO,
            'FECHA_LIMITE'=>$request->FECHA_LIMITE,
            'OBJ_GRAL'=>$request->OBJ_GRAL,
            'OBJ_ESP'=>$request->OBJ_ESP,
            'DESCRIPCION'=>$request->DESCRIPCION,
            'FECHA_INI'=>$request->FECHA_INI,
            'FECHA_DEF'=>$request->FECHA_DEF,
            'FECHA_PRORR'=>$request->FECHA_PRORR,
            'modalidad_id'=>$mod
            ]);
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
        $proyecto = DB::table('proyectos')
        ->join('modalidades','proyectos.modalidad_id','=','modalidades.id')
        ->where('proyectos.id',$id)
        ->first();
        return view('proyecto.edit',['proyecto'=>$proyecto]);
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
        $proyecto = DB::table('proyectos')
        ->where('proyectos.id',$id)
        ->update([
            'TITULO_PERFIL'=> $request->TITULO_PERFIL,
            'FECHA_REGISTRO'=>$request->FECHA_REGISTRO,
            'FECHA_LIMITE'=>$request->FECHA_LIMITE,
            'OBJ_GRAL'=>$request->OBJ_GRAL,
            'OBJ_ESP'=>$request->OBJ_ESP,
            'DESCRIPCION'=>$request->DESCRIPCION,
            'FECHA_INI'=>$request->FECHA_INI,
            'FECHA_DEF'=>$request->FECHA_DEF,
            'FECHA_PRORR'=>$request->FECHA_PRORR,
            'modalidad_id'=>$request->modalidad_id
        ]);
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
        //
    }
}
