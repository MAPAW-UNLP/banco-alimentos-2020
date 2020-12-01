<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Turno;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ComboController extends Controller
{
    function __construct()
{

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userlogged = Auth::User();

        //Organizacione::where('estado','<>',0)->paginate(5)
        $datos['combos']=Combo::where('estado','<>',2)->paginate();
        $datos['role']= "empleado";
        //$datos['role']= "admin";


        // dd($datos);


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
    public function store(Request $request){
        $prod=request()->input('producto');
        $cant=request()->input('cant');
        $datos=request()->except('cant','producto','_token');    
        $i=0;
        if (!is_null($prod)){  
            $combo=Combo::create($datos);          
            foreach ($prod as &$valor) {
                $p=[
                    'combo_id'=>$combo->id,
                    'producto'=>$prod[$i],
                    'cantidad'=>$cant[$i],
                ];
                Producto::insert($p);
                $i=$i+1;
            }
        }
        //return response()->json($datos);
        return redirect('combos')->with('success', 'El combo se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('combo.show', ['combo' => Combo::findOrFail($id)]);
        return view('combo.show', ['combo' => Combo::findOrFail($id)]);
    }


    public function solicitar($user)
    {
        // buscar los combos de ese usuario o todos los combos 
        $hoy = getdate();
        $myFecha = strval($hoy['year'])."-".strval($hoy['mon'])."-".strval($hoy['mday']);
        $combos = Combo::where('estado','=',1)->where('stock','>',0)->with("productos")->get();
        $datos['combos']=$combos;
        $datos['turnos']=Turno::where('fechaHora','>',$myFecha)->where('turnosDisponibles','>',0)->get();
        //return response()->json($datos);
        return view('combo.solicitar',$datos);
    }


    public function calendar($idcombo,$fecha = NULL){

        if(is_null($fecha)){
            $hoy = getdate();
            $myFecha = strval($hoy['year'])."-".strval($hoy['mon'])."-".strval($hoy['mday']);
            $datos['turnos']=Turno::where('fechaHora','=',$myFecha)->get();
            $datos['horarios']=Horario::paginate();
            $datos['vAnio']=strval($hoy['year']);
            $datos['vMes']=strval($hoy['mon']);
            $datos['vDia']=strval($hoy['mday']);
            $datos['idcombo'] = $idcombo;
            return view('combo.calendar',$datos);
        }else{
            $datos['turnos']=Turno::where('fechaHora','=',$fecha)->get();
            $datos['horarios']=Horario::paginate();
            $datos['vAnio']=substr($fecha,0,4);
            $datos['vMes']=substr($fecha,5,2);
            $datos['vDia']=substr($fecha,8,2);
            $datos['idcombo'] = $idcombo;
            return view('combo.calendar',$datos);
        }
    }



    public function ver($id)
    {
        // return view('combo.show', ['combo' => Combo::findOrFail($id)]);
       
        dd($id);

        return view('combo.edit', ['combo' => 1]);
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
        if (!is_null($prod)){
            foreach ($prod as &$valor) {
                $p=[
                    'combo_id'=>$id,
                    'producto'=>$prod[$i],
                    'cantidad'=>$cant[$i]
                ];
                Producto::insert($p);
                $i=$i+1;
            }
        }
        return redirect('combos')->with('success', 'El combo se modificó correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido=Pedido::where('combo_id', '=', 1)->first();
        if (is_null($pedido)){
            Combo::destroy($id);
        }else{
            $combo=Combo::findOrFail($id);
            $combo['estado']=2;
            Combo::where('id','=',$id)->update($combo->toArray());
        }
        return redirect('combos')->with('success', 'El combo se eliminó correctamente');;
        //Producto::where('combo_id', '=', $id)->delete();
        //Combo::destroy($id);
        //return redirect('combos');
    }

    public function cambiarEstado($id)
    {
        $combo=Combo::findOrFail($id);
        if ($combo['estado']==1){
            $combo['estado']=0;
        }else{
            $combo['estado']=1;
        }
        Combo::where('id','=',$id)->update($combo->toArray());
        return redirect('combos');
    }

    public function estado_solicitud_combos($id){
        return view('estado-solicitud.combos', ['combo' => Combo::findOrFail($id)]);
    }
}