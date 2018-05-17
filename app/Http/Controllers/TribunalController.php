<?php

namespace App\Http\Controllers;
use App\Tribunal;
use App\Proyecto;
use App\Profesional;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $tribunal = 15;
        $now=Carbon::now();
        
        $proyectos=Proyecto::find(1)->profesional;
       // return $proyectos;
        return view('tribunal.asignacion')->with(compact('tribunales','tribunal','now'));
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
        return vierw('tribunal.asignacion');
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
}
