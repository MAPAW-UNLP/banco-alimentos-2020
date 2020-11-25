<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\CantPersonasServicios;
use App\Models\CantPersonasEdads;
use App\Models\Organizacione;
use App\Models\CantRacionesDias;

use RechazoController;
use Illuminate\Support\Facades\Auth;
class SolicitudController extends Controller
{
 /*   function __construct()
{
$this->middleware('permission:solicitud-list|solicitud-create|solicitud-edit|solicitud-delete', ['only' => ['index','store']]);
$this->middleware('permission:solicitud-create', ['only' => ['create','store','aceptar','rechazar']]);
$this->middleware('permission:solicitud-edit', ['only' => ['edit','update','aceptar','rechazar']]);
$this->middleware('permission:solicitud-delete', ['only' => ['destroy','aceptar','rechazar']]);
}*/
    
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $datos['solicitudes']=Solicitud::where('estado','=',0)->paginate();
      return view('main-manage-social-area',$datos);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('solicitud_new');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $datos=request();


    $organizacion['nombre']=$datos['nombre_institucion'];
    $organizacion['telefono']=$datos['telefono'];
    $organizacion['domicilio']=$datos['barrio'];
    $organizacion['localidad']=$datos['localidad'];
    $organizacion['personeria_juridica']=$datos['personeria'];
    $paramAval=intval($datos['municipio'])+intval($datos['estados'])+intval($datos['movimiento']);
    $organizacion['aval']=1;
    $organizacion['ayuda_alimentaria']=$datos['alimentaria'];
    $organizacion['ayuda_financiera']=$datos['financiera'];
    $organizacion['tarea']=$datos['nombre_institucion'];
    
    $id_organizacion=Organizacione::insertGetId($organizacion);

    //ACA ME ENCARGO DE LA CANTIDAD DE PERSONAS
    $cantPersonas[1]=$datos['desayuno'];
    $cantPersonas[2]=$datos['almuerzo'];
    $cantPersonas[3]=$datos['merienda'];
    $cantPersonas[4]=$datos['cena'];
    foreach($cantPersonas as $key=>$value) {
        $paramCantPersonas=[];
        $paramCantPersonas['organizacion_id'] = $id_organizacion;
        $paramCantPersonas['dia'] = $key;
        $paramCantPersonas['cant'] = $cantPersonas[$key];
        CantPersonasServicios::insert($paramCantPersonas);
    }
    //ACA ME ENCARGO DE LA edad DE PERSONAS
    $edadPersonas[1]=$datos['uno'];
    $edadPersonas[2]=$datos['dos'];
    $edadPersonas[3]=$datos['tres'];
    $edadPersonas[4]=$datos['cuatro'];
    $edadPersonas[5]=$datos['cinco'];
    $edadPersonas[6]=$datos['seis'];

    foreach($edadPersonas as $key=>$value) {
        $paramEdadPersonas=[];
        $paramEdadPersonas['organizacion_id'] = $id_organizacion;
        $paramEdadPersonas['rango'] = $key;
        $paramEdadPersonas['cant'] = intval($value);
        CantPersonasEdads::insert($paramEdadPersonas);
    }

    //Raciones días

    $paramDesayuno['organizacion_id']=$id_organizacion;
    $paramDesayuno['comida']=1;
    $paramDesayuno['lunes']=$datos['DL'];
    $paramDesayuno['martes']=$datos['DMA'];
    $paramDesayuno['miercoles']=$datos['DMI'];
    $paramDesayuno['jueves']=$datos['DJ'];
    $paramDesayuno['viernes']=$datos['DV'];
    $paramDesayuno['rangoHorario']='';
    CantRacionesDias::insert($paramDesayuno);
    $paramAlmuerzo['organizacion_id']=$id_organizacion;
    $paramAlmuerzo['comida']=2;
    $paramAlmuerzo['lunes']=$datos['AL'];
    $paramAlmuerzo['martes']=$datos['AMA'];
    $paramAlmuerzo['miercoles']=$datos['AMI'];
    $paramAlmuerzo['jueves']=$datos['AJ'];
    $paramAlmuerzo['viernes']=$datos['AV'];
    $paramAlmuerzo['rangoHorario']='';
    CantRacionesDias::insert($paramAlmuerzo);
    $paramMerienda['organizacion_id']=$id_organizacion;
    $paramMerienda['comida']=3;
    $paramMerienda['lunes']=$datos['ML'];
    $paramMerienda['martes']=$datos['MMA'];
    $paramMerienda['miercoles']=$datos['MMI'];
    $paramMerienda['jueves']=$datos['MJ'];
    $paramMerienda['viernes']=$datos['MV'];
    $paramMerienda['rangoHorario']='';
    CantRacionesDias::insert($paramMerienda);
    $paramCena['organizacion_id']=$id_organizacion;
    $paramCena['comida']=4;
    $paramCena['lunes']=$datos['CL'];
    $paramCena['martes']=$datos['CMA'];
    $paramCena['miercoles']=$datos['CMI'];
    $paramCena['jueves']=$datos['CJ'];
    $paramCena['viernes']=$datos['CV'];
    $paramCena['rangoHorario']='';
    CantRacionesDias::insert($paramCena);

    $paramSolicitud['organizacion_id']=$id_organizacion;
    $paramSolicitud['estado']=0;
    Solicitud::insert($paramSolicitud);
    return response()->json($datos);
    //return redirect('organizaciones');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\solicitud  $solicitud
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      return view('solicitud_show', ['solicitud' => Solicitud::findOrFail($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\solicitud  $solicitud
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      return view('solicitud_edit', ['solicitud' => Solicitud::findOrFail($id)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\solicitud  $solicitud
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $datos=request()->except(['_token','_method']);
      solicitud::where('id','=',$id)->update($datos);

      return redirect('solicitud');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\solicitud  $solicitud
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      solicitud::destroy($id);
      return redirect('solicitud');
  }
  public function aceptar($id)
  {
      $solicitud=Solicitud::findOrFail($id);
      $solicitud['estado']=1;
      solicitud::where('id','=',$id)->update($solicitud->toArray());
      return redirect('solicitudes')->with('success', 'La solicitud fue aceptada correctamente');
  }
  public function rechazar($id)
  {
      $solicitud=Solicitud::findOrFail($id);
      $solicitud['estado']=2;
      solicitud::where('id','=',$id)->update($solicitud->toArray());
      return redirect('solicitudes')->with('success', 'La solicitud fue rechazada correctamente');
  }
  public function solicitudOrganizacion(){
    $solicitud=solicitud::where('organizacion_id','=',Auth::id())->where('estado','=',0)->first();
    if (is_null($solicitud)){
        $datos['tengoDatos']=0;
    }else{
        $datos['tengoDatos']=1;
        $datos['solicitud']=$solicitud;
    }
    return view('estado-solicitud.indexDatos',$datos);
  }
}

