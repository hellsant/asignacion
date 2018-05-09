<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use DB;
class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carrera::all();
        return view('carrera.lista',['carreras'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrera.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=Carrera::where('COD_CARRERA','=',$request->COD_CARRERA)->first();
        $q=Carrera::where('NOM_CARRERA','=',$request->NOM_CARRERA)->first();
        if($p==null&&$q==null)
        {
            Carrera::create($request->all());
            return redirect('carrera');
        }
        else
        {
            return redirect('carrera');
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
        $carrera =Carrera::findOrFail($id);
        return view('carrera.edit',[
            'carrera'=>$carrera
        ]);
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
        Carrera::findOrFail($id)->update($request->all());
        return redirect('carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carrera::findOrFail($id)->delete();
        return redirect('carrera');
    }

    public function ocultar($id)
    {
        Carrera::findOrFail($id)->delete();
        return redirect('carrera');
    }
}
