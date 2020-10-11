<?php

namespace App\Http\Controllers;

use App\Models\Rechazo;
use Illuminate\Http\Request;

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
        return view('rechazo_index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rechazo_new',$datos);
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
        $datos=request()->all();
        Rechazo::insert($datos);
        $this->index();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function show(Rechazo $rechazo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function edit(Rechazo $rechazo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rechazo $rechazo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rechazo  $rechazo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rechazo $rechazo)
    {
        //
    }
}
