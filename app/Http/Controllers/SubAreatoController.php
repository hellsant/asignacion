<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Subarea;
use App\Area;
class SubAreatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subareas = Subarea::all();
        return view('subarea.lista')->with(compact('subareas'));
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
        SubArea::create($request->all());
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subarea = Subarea::findOrFail($id);
        return view('subarea.edit')->with(compact('subarea'));
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
        Subarea::findOrFail($id)->update($request->all());
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
        Subarea::findOrFail($id)->delete();
        return redirect('subarea');
    }

    public function recibe($area,$id)
    {
        return view('subarea.registrar')->with(compact('area','id'));
    }

    public function ocultar($id)
    {
        Subarea::findOrFail($id)->delete();
        return redirect('subarea');
    }
}