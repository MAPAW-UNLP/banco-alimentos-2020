<?php

namespace App\Http\Controllers;
use App\Models\Modificacione;
use App\Models\Organizacione;
use Illuminate\Http\Request;

class ModificacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['modificaciones']=Modificacione::paginate();
        return view('modificacione.index',$datos);
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
        //
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
        //
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
        //
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

    public function aceptar($id)
    {
        $solicitud = Modificacione::findOrFail($id);
        $solicitud['estado']=1;
        Solicitude::where('id','=',$id)->update($solicitud->toArray());
        $orga=Organizacione::findOrFail($solicitud->organizacion_id);
        $orga['nombre']=$solicitud['nombre'];
        $orga['barrio']=$solicitud['barrio'];
        $orga['localidad']=$solicitud['localidad'];
        $orga['telefono']=$solicitud['telefono'];
        $orga['direccion']=$solicitud['direccion'];
        $orga['personeria_juridica']=$solicitud['personeria_juridica'];
        $orga['aval']=$solicitud['aval'];
        $orga['cantPers']=$solicitud['cantPers'];
        $orga['edad']=$solicitud['edad'];
        $orga['ayuda_alimentaria']=$solicitud['ayuda_alimentaria'];
        $orga['ayuda_financiera']=$solicitud['ayuda_financiera'];
        $orga['tipo_servicio']=$solicitud['tipo_servicio'];
        $orga['tarea']=$solicitud['tarea'];
        Organizacione::where('id','=',$solicitud->organizacion_id)->update($orga->toArray());
        return response()->json($orga);
    }
}
