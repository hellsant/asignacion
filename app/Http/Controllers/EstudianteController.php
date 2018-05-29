<?php

namespace App\Http\Controllers;
use App\Estudiante;
use App\Proyecto;
use App\Http\Requests\EstudianteFormRequest;
use App\Http\Requests\EstudianteFormEditRequest;
use Illuminate\Http\Request;
use DB;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function index(Request $request)
    // {
    //     if($request){
    //         $query=trim($request->get('searchSIS'));
    //         $estudiantes = Estudiante::orderBy('AP_PAT_EST','ASC')->paginate(10);
    //         ->where('COD_SIS','LIKE','%'.$query.'%')
    //
    //         return view('estudiante.lista',["searchSIS"=>$query ])->with(compact('estudiantes'));
    //     }
    // }
    public function index(Request $request)
    {
            $estudiantes = Estudiante::Buscar($request->nombre)->orderBy('AP_PAT_EST','ASC')->paginate(10);
            

            return view('estudiante.lista')->with(compact('estudiantes'));
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
    public function store(EstudianteFormRequest $request)
    {
      $estudiante= new Estudiante;
      $estudiante->COD_SIS=$request->cod_sis;
      $estudiante->NOM_EST=$request->nombre;
      $estudiante->AP_PAT_EST=$request->apellido_paterno;
      $estudiante->AP_MAT_EST=$request->apellido_materno;
      $estudiante->CI=$request->ci;
      $estudiante->TELF=$request->telefono;
      $estudiante->CORRETO_EST=$request->correo;
      $estudiante->save();


            return redirect('estudiante');

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
    public function update(EstudianteFormEditRequest $request, $id)
    {

      $estudiante=Estudiante::find($id);

      $estudiante->COD_SIS=$request->cod_sis;
      $estudiante->NOM_EST=$request->nombre;
      $estudiante->AP_PAT_EST=$request->apellido_paterno;
      $estudiante->AP_MAT_EST=$request->apellido_materno;
      $estudiante->CI=$request->ci;
      $estudiante->TELF=$request->telefono;
      $estudiante->CORRETO_EST=$request->correo;
      $estudiante->save();
        // Estudiante::findOrFail($id)->update($request->all());
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

    public function ocultar($id)
    {
        Estudiante::findOrFail($id)->delete();
        return redirect('estudiante');
    }
}
