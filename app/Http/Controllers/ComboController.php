<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    function __construct()
{
$this->middleware('permission:combo-list|combo-create|combo-edit|combo-delete', ['only' => ['index','store']]);
$this->middleware('permission:combo-create', ['only' => ['create','store']]);
$this->middleware('permission:combo-edit', ['only' => ['edit','update']]);
$this->middleware('permission:combo-delete', ['only' => ['destroy']]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['combos']=Combo::paginate();
        return view('combo.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('combo.create');
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
        Combo::insert($datos);
        return redirect('combos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('combo.show', ['combo' => Combo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('combo.edit', ['combo' => Combo::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        Combo::where('id','=',$id)->update($datos);

        return redirect('combos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Combo::destroy($id);
        return redirect('combos');
    }

    public function activar($id)
    {
        $combo=Combo::findOrFail($id);
        $combo['estado']=1;
        Combo::where('id','=',$id)->update($combo->toArray());
        return response()->json($combo);
    }
    public function desactivar($id)
    {
        $combo=Combo::findOrFail($id);
        $combo['estado']=0;
        Combo::where('id','=',$id)->update($combo->toArray());
        return response()->json($combo);
    }
}
