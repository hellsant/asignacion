<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SubAreatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('subareas')->get();
        return view('subarea.lista',['subareas'=> $data]);
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
    public function store(Request $request)
    {
        $id = DB::table('subareas')->insertGetId([
            'COD_SUBAREA'=>$request->COD_SUBAREA,
            'NOM_SUBAREA'=>$request->NOM_SUBAREA,
            'DESC_SUBAREA'=>$request->DESC_SUBAREA,
            'NOMBRE_AREA'=>$request->NOMBRE_AREA,
            'area_id'=>DB::table('areas')->where('NOMBRE_AREA',$request->NOMBRE_AREA)->value('id')
        ]);
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
        $subarea = DB::table('subareas')
        ->where('subareas.id',$id)
        ->first();
        return view('subarea.edit',['subarea'=>$subarea]);
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
        $subarea = DB::table('subareas')
        ->where('subareas.id',$id)
        ->update([
            'COD_SUBAREA'=> $request->COD_SUBAREA,
            'NOM_SUBAREA'=> $request->NOM_SUBAREA,
            'DESC_SUBAREA'=> $request->DESC_SUBAREA,
            'NOMBRE_AREA'=>$request->NOMBRE_AREA,
            'area_id'=>DB::table('areas')->where('NOMBRE_AREA',$request->NOMBRE_AREA)->value('id')
        ]);
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
        //
    }

    public function recibe($area)
    {
        return view('subarea.registrar',compact('area'));
    }
}
