<?php

namespace App\Http\Controllers;
use App\Profesional;
use Illuminate\Http\Request;
use DB;
class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Profesional::all();
        return view('profesional.lista',['profesionales'=> $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesional.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=Profesional::where('CI_PROF','=',$request->CI_PROF)->first();
        if($p==null)
        {
            Profesional::create($request->all());
            return redirect('profesional');
        }
        else
        {
            return redirect('profesional');
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
        $profesional = Profesional::findOrFail($id);
        return view('profesional.edit',[
            'profesional'=>$profesional
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
        Profesional::findOrFail($id)->update($request->all());
        return redirect('profesional');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesional::findOrFail($id)->delete();
        return redirect('profesional');
    }

    public function ocultar($id)
    {
        Profesional::findOrFail($id)->delete();
        return redirect('profesional');
    }
}
