<?php

namespace App\Http\Controllers;
use App\Estudiante;
use App\Proyecto;

use Illuminate\Http\Request;
use DB;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchSIS'));
            $estudiantes = Estudiante::orderBy('COD_SIS','desc')
            ->where('COD_SIS','LIKE','%'.$query.'%') 
            ->paginate(10);
            return view('estudiante.lista',["searchSIS"=>$query ])->with(compact('estudiantes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=Estudiante::where('COD_SIS','=',$request->COD_SIS)->first();
        $q=Estudiante::where('CI','=',$request->NOM_CI)->first();
        if($p==null&&$q==null)
        {
            Estudiante::create($request->all());
            return redirect('estudiante');
        }
        else
        {
            return redirect('estudiante');
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
        //Estudiante::whitTrashed()->findOrFail($id)->restore();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $estudiante = Estudiante::findOrFail($id);
        return view('estudiante.edit',[
            'estudiante'=>$estudiante
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
        Estudiante::findOrFail($id)->update($request->all());
        return redirect('estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::findOrFail($id)->delete();
        return redirect('estudiante');
    }
}
