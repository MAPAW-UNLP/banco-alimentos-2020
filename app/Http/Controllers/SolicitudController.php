<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\CantPersonasServicios;
use App\Models\CantPersonasEdads;
use App\Models\Organizacione;
use App\Models\CantRacionesDias;
use App\Models\User;
use Hash;
use App\Mail\SolicitudIngresada;
use Illuminate\Support\Facades\Mail;
use RechazoController;
use Illuminate\Support\Facades\Auth;
class SolicitudController extends Controller
{

    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $datos['solicitudes']=Solicitud::where('estado','=',0)->paginate(20);
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
    //return response()->json($datos);
    $paramUser['name'] = $datos['nombre_referente'];
    $paramUser['password'] = Hash::make('123456');
    $paramUser['email'] = $datos['referente'];
    $to = $paramUser['email'];
    $paramUser['estado'] = 0;
    $myUser=User::insertGetId($paramUser);
    $organizacion['user_id']=$myUser;
    $organizacion['nombre']=$datos['nombre_institucion'];
    $organizacion['telefono']=$datos['telefono'];
    $organizacion['domicilio']=$datos['barrio'];
    $organizacion['localidad']=$datos['localidad'];
    $organizacion['personeria_juridica']=$datos['personeria'];
    $paramAval=intval($datos['municipio'])+intval($datos['estados'])+intval($datos['movimiento']);
    $organizacion['aval']=1;
    $organizacion['txt_aval']=$datos['otro'];
    $organizacion['ayuda_alimentaria']=$datos['alimentaria'];
    $organizacion['txt_alimentaria']=$datos['txtAyudaAlimentaria'];
    $organizacion['ayuda_financiera']=$datos['financiera'];
    $organizacion['txt_financiera']=$datos['txtAyudaFinanciera'];
    $organizacion['txt_otra_financiera']=$datos['TextOtherFinanciera'];
    $organizacion['txt_otra_alimentaria']=$datos['TextOtherAlimentaria'];
    $organizacion['tarea']=$datos['tarea'];
    $organizacion['estado']=0;

    $id_organizacion=Organizacione::insertGetId($organizacion);

    //ACA ME ENCARGO DE LA CANTIDAD DE PERSONAS
    $cantPersonas[1]=$datos['desayuno'];
    $cantPersonas[2]=$datos['almuerzo'];
    $cantPersonas[3]=$datos['merienda'];
    $cantPersonas[4]=$datos['cena'];
    $cantPersonas[5]=$datos['bolson'];
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
    $paramDesayuno['desde']=$datos['desayuno_desde'];
    $paramDesayuno['hasta']=$datos['desayuno_hasta'];
    CantRacionesDias::insert($paramDesayuno);
    $paramAlmuerzo['organizacion_id']=$id_organizacion;
    $paramAlmuerzo['comida']=2;
    $paramAlmuerzo['lunes']=$datos['AL'];
    $paramAlmuerzo['martes']=$datos['AMA'];
    $paramAlmuerzo['miercoles']=$datos['AMI'];
    $paramAlmuerzo['jueves']=$datos['AJ'];
    $paramAlmuerzo['viernes']=$datos['AV'];
    $paramAlmuerzo['desde']=$datos['almuerzo_desde'];
    $paramAlmuerzo['hasta']=$datos['almuerzo_hasta'];
    CantRacionesDias::insert($paramAlmuerzo);
    $paramMerienda['organizacion_id']=$id_organizacion;
    $paramMerienda['comida']=3;
    $paramMerienda['lunes']=$datos['ML'];
    $paramMerienda['martes']=$datos['MMA'];
    $paramMerienda['miercoles']=$datos['MMI'];
    $paramMerienda['jueves']=$datos['MJ'];
    $paramMerienda['viernes']=$datos['MV'];
    $paramMerienda['desde']=$datos['merienda_desde'];
    $paramMerienda['hasta']=$datos['merienda_hasta'];
    CantRacionesDias::insert($paramMerienda);
    $paramCena['organizacion_id']=$id_organizacion;
    $paramCena['comida']=4;
    $paramCena['lunes']=$datos['CL'];
    $paramCena['martes']=$datos['CMA'];
    $paramCena['miercoles']=$datos['CMI'];
    $paramCena['jueves']=$datos['CJ'];
    $paramCena['viernes']=$datos['CV'];
    $paramCena['desde']=$datos['cena_desde'];
    $paramCena['hasta']=$datos['cena_hasta'];
    CantRacionesDias::insert($paramCena);

    $paramSolicitud['organizacion_id']=$id_organizacion;
    $paramSolicitud['estado']=0;
    Solicitud::insert($paramSolicitud);
    $organizacion['tarea']=$datos['nombre_institucion'];


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
    $paramDesayuno['desde']=$datos['desayuno_desde'];
    $paramDesayuno['hasta']=$datos['desayuno_hasta'];
    CantRacionesDias::insert($paramDesayuno);
    $paramAlmuerzo['organizacion_id']=$id_organizacion;
    $paramAlmuerzo['comida']=2;
    $paramAlmuerzo['lunes']=$datos['AL'];
    $paramAlmuerzo['martes']=$datos['AMA'];
    $paramAlmuerzo['miercoles']=$datos['AMI'];
    $paramAlmuerzo['jueves']=$datos['AJ'];
    $paramAlmuerzo['viernes']=$datos['AV'];
    $paramAlmuerzo['desde']=$datos['almuerzo_desde'];
    $paramAlmuerzo['hasta']=$datos['almuerzo_hasta'];
    CantRacionesDias::insert($paramAlmuerzo);
    $paramMerienda['organizacion_id']=$id_organizacion;
    $paramMerienda['comida']=3;
    $paramMerienda['lunes']=$datos['ML'];
    $paramMerienda['martes']=$datos['MMA'];
    $paramMerienda['miercoles']=$datos['MMI'];
    $paramMerienda['jueves']=$datos['MJ'];
    $paramMerienda['viernes']=$datos['MV'];
    $paramMerienda['desde']=$datos['merienda_desde'];
    $paramMerienda['hasta']=$datos['merienda_hasta'];
    CantRacionesDias::insert($paramMerienda);
    $paramCena['organizacion_id']=$id_organizacion;
    $paramCena['comida']=4;
    $paramCena['lunes']=$datos['CL'];
    $paramCena['martes']=$datos['CMA'];
    $paramCena['miercoles']=$datos['CMI'];
    $paramCena['jueves']=$datos['CJ'];
    $paramCena['viernes']=$datos['CV'];
    $paramCena['desde']=$datos['cena_desde'];
    $paramCena['hasta']=$datos['cena_hasta'];
    CantRacionesDias::insert($paramCena);


    $paramSolicitud['organizacion_id']=$id_organizacion;
    $paramSolicitud['estado']=0;
    return redirect('/')->with('success', 'Se registro su solicitud. El Banco Alimentario se estara comunicando');
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
    $datos['solicitud']=$solicitud;
    if (is_null($solicitud)){
        $datos['tengoDatos']=0;
    }else{
        $datos['tengoDatos']=1;
    }
    return view('estado-solicitud.indexDatos',$datos);
  }

  public function estado_solicitud_datos($id)
  {
      return view('estado-solicitud.datos', ['solicitud' => Solicitud::findOrFail($id)]);
  }
}

