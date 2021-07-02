<?php

namespace App\Http\Controllers;

use App\Phoenix;
use App\JhonatanPermission\Models\Porta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Departamentos;
use App\TipoCliente;
use App\Origen;
use App\Estadorevisado;
use App\Velocidad;
use App\Planes_prepost;
use App\Estrato;
use App\Activacion;
use App\Tecnologia;
use App\Adicionales;
use App\Producto;
use App\Planadquiere;
use App\Corte;
use App\Revisados;
use App\User;
use stdClass;
use App\Equipos;
use App\tPlanes;
use App\tPago;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhoenixExport;
use Carbon\Carbon;

class PhoenixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $usuarios = User::all();
        $phoenixes = phoenix::all();

        $phoenixes = phoenix::orderBy('revisados', 'asc')->paginate(10);
        return view('phoenix.index',compact('phoenixes','depto','tipoCliente','origen','planadquiere', 'usuarios'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            Carbon::setLocale('co');
	        $date = Carbon::now()->format('Y-m-d');
            $hora = Carbon::now()->format('H:i:s');
            $user_id = Auth::user()->cedula;
            $user_nombre = Auth::user()->name;
            $depto = Departamentos::all();
            $tipoCliente = TipoCliente::all();
            $planadquiere = Planadquiere::all();
            $origen = Origen::all();
            $usuarios = User::all();
            $modelos = Equipos::all();
            $tplanes = tPlanes::all();
            $tipoPagoses = tPago::all();


             return view('phoenix.create',compact('hora','date','user_nombre','user_id','depto','tipoPagoses','tplanes','modelos','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request  , phoenix $phoenixes)
    {
        $datosphoenix=request()->except('_token');
        if($request->hasFile('confronta')){
            $datosphoenix['confronta']=$request->file('confronta')->store('uploads','public');
        }
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        phoenix::insert($datosphoenix);
        return back();


    }


    public function searchphoenix( Request $request)
    {

        $phoenixes = phoenix::all();
        $searchphoenix = $request->get('searchphoenix');
        $phoenixes= phoenix::firstOrNew()->where('numero', 'like', '%'.$searchphoenix.'%')->paginate(5);
        return view('phoenix.index', ['phoenixes' => $phoenixes]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\phoenix  $phoenix
     * @return \Illuminate\Http\Response
     */
    public function show(phoenix $phoenix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\phoenix  $phoenix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $phoenixes = phoenix::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','phoenix.edit');
        $phoenixes=phoenix::findOrFail($id);
        return view('phoenix.edit',compact('hora','date','user_nombre','user_id','phoenixes','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phoenix  $phoenix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $usuarios = User::all();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;
        $revisadoses = Revisados::all();
        $datosPorta=request()->except(['_token','_method']);
        phoenix::where('id','=',$id)->update($datosPorta);
        $phoenixes=phoenix::findOrFail($id);
        return view('phoenix.edit',compact('user_id','user_nombre','date','hora','phoenixes', 'usuarios','revisadoses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phoenix  $phoenix
     * @return \Illuminate\Http\Response
     */
    public function destroy(phoenix $phoenix)
    {
        //
    }
public function exportExcel()
{
return Excel::download(new PhoenixExport, 'phoenix-list.xlsx');

}


}
