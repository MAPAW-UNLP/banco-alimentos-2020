<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Producto;
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
        //Organizacione::where('estado','<>',0)->paginate(5)
        $datos['combos']=Combo::where('estado','<>',0)->paginate(5);
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
        $prod=request()->input('producto');
        $cant=request()->input('cant');
        $datos=request()->except('cant','producto','_token');
        $combo=Combo::create($datos);
        $i=0;
        foreach ($prod as &$valor) {
            $p=[
                'combo_id'=>$combo->id,
                'producto'=>$prod[$i],
                'cantidad'=>$cant[$i]
            ];
            Producto::insert($p);
            $i=$i+1;
        }
        return response()->json($combo);
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
    {$combo = Combo::findOrFail($id);
        //return response()->json($combo);
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

        $prod=request()->input('producto');
        $cant=request()->input('cant');
        $datos=request()->except('cant','producto','_token','_method');
        Producto::where('combo_id', '=', $id)->delete();
        Combo::where('id','=',$id)->update($datos);
        $i=0;
        foreach ($prod as &$valor) {
            $p=[
                'combo_id'=>$id,
                'producto'=>$prod[$i],
                'cantidad'=>$cant[$i]
            ];
            Producto::insert($p);
            $i=$i+1;
        }
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