<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
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
      $datos=request()->except('_token');
      solicitud::insert($datos);
      return redirect('solicitud');
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

