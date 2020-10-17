<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['turnos']=Turno::paginate();
        return view('turno_index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turno_new');
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
        turno::insert($datos);
        return redirect('turnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('turno_show', ['turno' => Turno::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('turno_edit', ['turno' => Turno::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        turno::where('id','=',$id)->update($datos);

        return redirect('turnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        turno::destroy($id);
        return redirect('turnos');
    }
}
