<?php

namespace App\Http\Controllers;

use App\Models\Rechazo;
use Illuminate\Http\Request;
use SolicitudController;
class RechazoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['rechazos']=Rechazo::paginate();
        return view('rechazo.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rechazo_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=request()->except('_token','solicitud_id');
        rechazo::insert($datos);
        app('App\Http\Controllers\PrintReportController')->rechazar();
        return redirect('rechazos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rechazo_show', ['rechazo' => Rechazo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('rechazo_edit', ['rechazo' => Rechazo::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        rechazo::where('id','=',$id)->update($datos);

        return redirect('rechazos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        rechazo::destroy($id);
        return redirect('rechazos');
    }
}
