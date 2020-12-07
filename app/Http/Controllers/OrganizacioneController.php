<?php

namespace App\Http\Controllers;

use App\Models\Organizacione;
use App\Models\User;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrganizacionDeshabilitada;
use App\Mail\OrganizacionHabilitada;
use App\Mail\ModificacionDeDatos;
use App\Models\NotificacionAceptacion;
use App\Mail\SolicitudAceptada;

class OrganizacioneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:organizacion-list', ['only' => ['index','store','create','store','aceptar','rechazar']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['organizaciones']=Organizacione::where('estado','<>',2)->paginate();
        return view('main-manage-social-area-organization-data',$datos);

    }


    public function busqueda(Request $request){
        $stringbusqueda = $request->get('stringbusqueda');

        // busca si ese string es un id y si existe en la base de datos
        // busca si ese string es un nombre y si existe en la base de datos
        $datos['organizaciones']=Organizacione::where('estado','<>',2)->where('id','=',intval($stringbusqueda))->orWhere('nombre','LIKE',"%{$stringbusqueda}%")->paginate(5);

        return view('main-manage-social-area-organization-data',$datos);


    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacione_new');
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
        $solicitud=$datos['nombre_institucion'];
        //Organizacione::insert($datos);
        return response()->json($datos);
        //return redirect('organizaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organizacione = Organizacione::findOrFail($id);
        return view('organizacione_show', ['organizacione' => Organizacione::findOrFail($id) , 'user' => User::findOrFail($organizacione->user_id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function edit_short($id)
    {
        return view('organizacion.edit-short', ['organizacione' => Organizacione::findOrFail($id)]);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('organizacion.edit', ['organizacione' => Organizacione::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $datos=request()->except(['_token','_method']);
        Organizacione::where('id','=',$id)->update($datos);
        #DESCOMENTAR PARA MANDAR EL MAIL CUANDO ESTE LA VISTA
        #$param['id'] = $id;
        #$obj = new ModificacionDeDatos();
        #$to = 'mapaw2020@gmail.com';
        #Mail::to($to)->send($obj->parametro($param));
        return redirect('organizaciones');
    }
    public function updateShort(Request $request)
    {
        $id = $request->input('id');
        $datos=request()->except(['_token','_method','id']);
        Organizacione::where('id','=',$id)->update($datos);
        $param['id'] = $id;
        return $id;
        $obj = new ModificacionDeDatos();
        $to = 'mapaw2020@gmail.com';
        Mail::to($to)->send($obj->parametro($param));
        return redirect('organizaciones');
        //return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Organizacione::destroy($id);
        return redirect('organizaciones');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function aceptar($id)
    {
        $sol['datos'] = Solicitud::where('organizacion_id','=', $id)->first();
        $sol['datos']->estado=1;
        Solicitud::where('id','=',$sol['datos']->id)->update($sol['datos']->toArray());
        $organizacion=organizacione::findOrFail($sol['datos']->organizacion_id);
        $organizacion['estado']=1;
        $obj = new SolicitudAceptada();
        $param['notificacion'] = NotificacionAceptacion::findOrFail(1);
        $usuario= User::findOrFail($organizacion['user_id']);
        $to = $usuario->email;
        Mail::to($to)->send($obj->parametro($param));
        organizacione::where('id','=',$id)->update($organizacion->toArray());
        return redirect('solicitudes')->with('success', 'La solicitud fue aceptada correctamente');
    }

    public function cambiarEstado($id)
    {
        $organizacione=Organizacione::findOrFail($id);
        if ($organizacione['estado']==1){
            $organizacione['estado']=0;
            $to = $organizacione['email'];
            $obj = new OrganizacionDeshabilitada();
            Mail::to($to)->send($obj->parametro());
        }else{
            $organizacione['estado']=1;
            $to = $organizacione['email'];
            $obj = new OrganizacionHabilitada();
            Mail::to($to)->send($obj->parametro());
        }
        Organizacione::where('id','=',$id)->update($organizacione->toArray());
        return redirect('organizaciones');
    }

    public function terminos(){
        return view('organizacion.terminos');
    }

    public function registro(){
        return view('organizacion.registro');
    }

    public function show_organizacion($id){
        $organizacione = Organizacione::findOrFail($id);
        return view('organizacion_show', ['organizacione' => Organizacione::findOrFail($id) , 'user' => User::findOrFail($organizacione->user_id)]);
    }

    public function asignarId(Request $request){
        $datos=request()->except('_token');
        #return response()->json($datos);
        $orga=Organizacione::findOrFail($datos['organizacion_id']);
        $orga['organizacion_id']=$datos['motivo'];
        Organizacione::where('id','=',$datos['organizacion_id'])->update($orga->toArray());
        return redirect('organizaciones')->with('success', 'Se asigno correctamente el ID organización');;
    }
}


#public function store(Request $request){
 #   $datos=request()->except('_token');
 #   Rechazo::insert($datos);
 #   $orga=Organizacione::findOrFail($datos['organizacion_id']);
 #   $orga['estado']=2;
 #   Organizacione::where('id','=',$datos['organizacion_id'])->update($orga->toArray());
 #   $organizacion_solicitud = Solicitud::where('organizacion_id','=',$orga['id'])->first();
 #   $sol = Solicitud::findOrFail($organizacion_solicitud->id);
 #   $sol['estado']=2;
 #   Solicitud::where('id','=',$sol['id'])->update($sol->toArray());

 #   return redirect('solicitudes')->with('success', 'La solicitud fue rechazada correctamente');;
#}
