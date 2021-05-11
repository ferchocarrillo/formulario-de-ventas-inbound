<?php

namespace App\Http\Controllers;

use App\JhonatanPermission\Models\Rechazos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Departamentos;
use App\Causales;
use App\Linea;
use App\User;
use stdClass;

class RechazosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rechazos['rechazos']= Rechazos::paginate(10);
        return view('rechazos.index',$rechazos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $causales = Causales::all();
        $linea = Linea::all();
        $usuarios = User::all();
        $depto = Departamentos::all();
        $user_id  = Auth::user()->id;
        return view('rechazos/create',compact('causales','linea','depto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date1 = $request->input('claro');
        $date2 = $request->input('tigo');
        $date3 = $request->input('directv');
        $date4 = $request->input('wow');
        $date5 = $request->input('barrio');
        $date6 = $request->input('otros');





        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $rechazos = new Rechazos();
        $rechazos->numero_de_celular             = $request ->numero_de_celular;
        $rechazos->nombres                       = $request ->nombres;
        $rechazos->documento                     = $request ->documento;
        $rechazos->causal                        = $request ->causal;
        $rechazos->linea                         = $request ->linea;
        $rechazos->departamento                  = $request ->departamento;
        $rechazos->ciudad                        = $request ->id_ciudad;
        $rechazos->competencia                   = $date1." " .$date2." " .$date3." " .$date4." " .$date5." " .$date6;
        $rechazos->modalidad                     = $request ->modalidad;
        $rechazos->frechazo                      = $request ->frechazo;
        $rechazos->observacion                   = $request ->observacion;
        $rechazos->agente                        = $user_id.','.$user_nombre;
        $rechazos->save();
        return back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function show(Rechazos $rechazos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function edit(Rechazos $rechazos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rechazos $rechazos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rechazos $rechazos)
    {
        //
    }
}
