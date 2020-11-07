<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Horario;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fecha = null)
    {
        //
        if(is_null($fecha)){
            $hoy = getdate();
            $myFecha = strval($hoy['year'])."-".strval($hoy['mon'])."-".strval($hoy['mday']);
            $datos['turnos']=Turno::where('fechaHora','=',$myFecha)->get();
            $datos['horarios']=Horario::paginate();
            $datos['vAnio']=strval($hoy['year']);
            $datos['vMes']=strval($hoy['mon']);
            $datos['vDia']=strval($hoy['mday']);
            return view('main-calendar',$datos);
        }else{
            $datos['turnos']=Turno::where('fechaHora','=',$fecha)->get();
            $datos['horarios']=Horario::paginate();
            $datos['vAnio']=substr($fecha,0,4);
            $datos['vMes']=substr($fecha,5,2);
            $datos['vDia']=substr($fecha,8,2);
            return view('main-calendar',$datos);
        }


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
        //turno::insert($datos);
        //return view('turno_index',$datos);
        $fecha=request()->input('fechaHora');
        $check=request()->input('check');
        $cant=request()->input('cant');
        Turno::where('fechaHora', '=', $fecha)->delete();
        $i=0;
        if (!is_null($check)){            
            foreach ($check as &$valor) {
                $p=[
                    'fechahora'=>$fecha,
                    'horario_id'=>$check[$i],
                    'cantTurnos'=>$cant[$check[$i]-1],
                    'turnosDisponibles'=>$cant[$check[$i]-1]
                ];
                Turno::insert($p);
                $i=$i+1;
            }
        }else{
            return redirect('turnos')->with('error', 'No selecciono un horario');
        }
        return redirect('turnos')->with('success', 'El turno se creo correctamente');
        //return response()->json($datos);
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

        return redirect('turnos')->with('success', 'El turno se modifico correctamente');;
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
        return redirect('turnos')->with('success', 'El combo se creo correctamente');;
    }
    public function ver($fecha)
    {
        return view('turno_show', ['turno' => Turno::where('fechaHora','=',$fecha)->first()]);
    }
}
