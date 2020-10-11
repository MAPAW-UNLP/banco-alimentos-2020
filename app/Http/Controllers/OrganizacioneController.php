<?php

namespace App\Http\Controllers;

use App\Models\organizacione;
use Illuminate\Http\Request;

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

        $datos['organizaciones']=Organizacione::paginate();
        return view('organizacione_index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacione_new',$datos);
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
        Organizacione::insert($datos);
        $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function show(organizacione $organizacione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function edit(organizacione $organizacione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organizacione $organizacione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(organizacione $organizacione)
    {
        //
    }
}
