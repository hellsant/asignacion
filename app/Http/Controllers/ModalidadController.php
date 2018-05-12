<?php

namespace App\Http\Controllers;
use App\Modalidades;
use Illuminate\Http\Request;
use DB;
class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modalidades::all();
        return view('modalidad.lista',['modalidades'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modalidad.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Modalidades::create($request->all());
        return redirect('modalidad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $modalidad = Modalidades::findOrFail($id);
        return view('modalidad.edit',[
            'modalidad'=>$modalidad
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        Modalidades::findOrFail($id)->update($request->all());
        return redirect('modalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $modalidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modalidades::findOrFail()->delete($id);
        return redirect('modalidad');
    }

    public function ocultar($id)
    {
        Modalidades::findOrFail($id)->delete();
        return redirect('modalidad');
    }
}
