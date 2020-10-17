<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use RechazoController;
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
      //
      $datos['solicitud']=Solicitud::paginate();
      return view('solicitud_index',$datos);

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
      return response()->json($solicitud);
  }
    public function rechazar($id)
  {
      $solicitud=Solicitud::findOrFail($id);
      $solicitud['estado']=2;
      solicitud::where('id','=',$id)->update($solicitud->toArray());
      return response()->json($solicitud);
  }
}

