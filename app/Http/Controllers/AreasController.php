<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('areas')->get();
        return view('area.lista',['areas'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('areas')->insertGetId([
            'COD_AREA'=> $request->COD_AREA,
            'NOMBRE_AREA'=> $request->NOMBRE_AREA,
            'DESC_AREA'=> $request->DESC_AREA
        ]);
        return redirect('area');
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
        $areas = DB::table('areas')
        ->where('areas.id',$id)
        ->first();
        return view('area.edit',['area'=>$areas]);
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
        $areas = DB::table('areas')
        ->where('areas.id',$id)
        ->update([
            'COD_AREA'=> $request->COD_AREA,
            'NOMBRE_AREA'=> $request->NOMBRE_AREA,
            'DESC_AREA'=> $request->DESC_AREA
        ]);
        return redirect('area');
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
