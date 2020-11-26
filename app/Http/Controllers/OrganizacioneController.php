<?php

namespace App\Http\Controllers;

use App\Models\Organizacione;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['organizaciones']=Organizacione::where('estado','<>',2)->paginate(5);
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
        return view('organizacione_show', ['organizacione' => Organizacione::findOrFail($id)]);
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
        $sol=Solicitud::findOrFail($id);
        $sol['estado']=1;
        Solicitud::where('id','=',$id)->update($sol->toArray());
        $organizacion=organizacione::findOrFail($sol->organizacione->id);
        $organizacion['estado']=1;
        $obj = new SolicitudAceptada();
        $param['notificacion'] = NotificacionAceptacion::findOrFail(1);
        $to = $organizacion['email'];
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
        return view('organizacion_show', ['organizacione' => Organizacione::findOrFail($id)]);
    }
}
