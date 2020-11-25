<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['pedidos']=Pedido::paginate();
        return view('pedido_index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido_new');
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
        pedido::insert($datos);
        return redirect('pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pedido_show', ['pedido' => Pedido::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pedido_edit', ['pedido' => Pedido::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        pedido::where('id','=',$id)->update($datos);

        return redirect('pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pedido::destroy($id);
        return redirect('pedidos');
    }

    public function pedidosEmpresa($id)
    {
        $datos['pedidos']=pedido::where('organizacion_id','=',$id)->paginate();
        return redirect('pedidos');
    }
    public function estado_solicitud_indexCombo(){
        $pedidos=pedido::where('organizacion_id','=',Auth::id())->paginate();
        if (is_null($pedidos)){
            $datos['tengoDatos']=0;
        }else{
            $datos['tengoDatos']=1;
            $datos['pedidos']=$pedidos;
        }
        return view('estado-solicitud.index',$datos);
    }
}