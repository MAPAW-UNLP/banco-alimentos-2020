<?php

namespace App\Http\Controllers;
use App\Models\Modificacione;
use App\Models\Organizacione;
use App\Models\Solicitud;
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
        $datos['modificaciones']=Modificacione::where('estado','=',0)->paginate();
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
        return view('modificacione.show', ['modificacione' => Modificacione::findOrFail($id)]);
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
        $Modificacione = Modificacione::findOrFail($id);
        $Modificacione['estado']=1;
        Modificacione::where('id','=',$id)->update($Modificacione->toArray());
        $orga=Organizacione::findOrFail($Modificacione->organizacion_id);
        $orga['nombre']=$Modificacione['nombre'];
        $orga['barrio']=$Modificacione['barrio'];
        $orga['localidad']=$Modificacione['localidad'];
        $orga['telefono']=$Modificacione['telefono'];
        $orga['direccion']=$Modificacione['direccion'];
        $orga['personeria_juridica']=$Modificacione['personeria_juridica'];
        $orga['aval']=$Modificacione['aval'];
        $orga['cantPers']=$Modificacione['cantPers'];
        $orga['edad']=$Modificacione['edad'];
        $orga['ayuda_alimentaria']=$Modificacione['ayuda_alimentaria'];
        $orga['ayuda_financiera']=$Modificacione['ayuda_financiera'];
        $orga['tipo_servicio']=$Modificacione['tipo_servicio'];
        $orga['tarea']=$Modificacione['tarea'];
        Organizacione::where('id','=',$Modificacione->organizacion_id)->update($orga->toArray());
        return redirect('modificaciones')->with('success', 'La modificación fue aceptada correctamente');
    }
    public function cancelar($id)
    {
        $Modificacione = Modificacione::findOrFail($id);
        $Modificacione['estado']=2;
        Modificacione::where('id','=',$id)->update($Modificacione->toArray());
        return redirect('modificaciones')->with('success', 'La modificación fue rechazada correctamente');
    }
}
