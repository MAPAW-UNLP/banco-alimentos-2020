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
    public function index()
    {
        //
        $datos['turnos']=Turno::paginate();
        $datos['horarios']=Horario::paginate();
        return view('main-calendar',$datos);

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
        $i=0;
        if (!is_null($check)){            
            foreach ($check as &$valor) {
                $p=[
                    'fechahora'=>$fecha,
                    'turno_id'=>$check[$i],
                    'cantTurnos'=>$cant[$check[$i]],
                    'turnosDisponibles'=>$cant[$check[$i]]
                ];
                Turno::insert($p);
                $i=$i+1;
            }
        }
        return redirect('turnos');
        return response()->json($datos);
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
