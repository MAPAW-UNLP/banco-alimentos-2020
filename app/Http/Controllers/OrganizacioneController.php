<?php

namespace App\Http\Controllers;

use App\Models\Organizacione;
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
        $datos['organizaciones']=organizacione::paginate();
        return view('organizacione_index',$datos);

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
        $datos=request()->except('_token');
        organizacione::insert($datos);
        return redirect('organizaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('organizacione_show', ['organizacione' => organizacione::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('organizacione_edit', ['organizacione' => organizacione::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        organizacione::where('id','=',$id)->update($datos);

        return redirect('organizaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizacione  $organizacione
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        organizacione::destroy($id);
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
        $organizacion=organizacione::findOrFail($id);
        $organizacion['estado']=1;
        organizacione::where('id','=',$id)->update($organizacion->toArray());
        return response()->json($organizacion);
    }
}
