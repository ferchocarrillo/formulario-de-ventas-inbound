<?php

namespace App\Http\Controllers;

use App\lineaNueva;
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
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LineaNuevaExport;

class LineaNuevaController extends Controller
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

        $lineanuevas = lineaNueva::orderBy('revisados', 'asc')->paginate(10);
        return view('lineanueva.index',compact('lineanuevas','depto','tipoCliente','origen','planadquiere', 'usuarios'));


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


        return view('lineanueva.create',compact('hora','date','user_nombre','user_id','depto','tipoCliente','origen','planadquiere', 'usuarios'));
    }


    public function searchlineanueva( Request $request)
    {

        $lineanuevas = lineaNueva::all();

        $searchportadigital = $request->get('searchlineanueva');
        $lineanuevas= lineaNueva::firstOrNew()->where('numero', 'like', '%'.$searchportadigital.'%')->paginate(5);
        return view('lineanueva.index', ['lineanuevas' => $lineanuevas]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , lineaNueva $lineanuevas)
    {


        $datoslineanueva=request()->except('_token');

        if($request->hasFile('confronta')){
            $datoslineanueva['confronta']=$request->file('confronta')->store('uploads','public');
        }

        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;

        lineaNueva::insert($datoslineanueva);
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lineaNueva  $lineaNueva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $linenuevas = lineaNueva::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','lineanueva.edit');
        $linenuevas = lineaNueva::findOrFail($id);
        return view('lineanueva.edit',compact('hora','date','user_nombre','user_id','linenuevas','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lineaNueva  $lineaNueva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $lineanuevas=lineaNueva::findOrFail($id);
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','lineanueva.edit');

        return view('lineanueva.edit',compact('user_id','user_nombre','date','hora','lineanuevas','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lineaNueva  $lineaNueva
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
        $revisadoses = Revisados::all();
        $datosPorta=request()->except(['_token','_method']);
        lineaNueva::where('id','=',$id)->update($datosPorta);
        $lineanuevas=lineaNueva::findOrFail($id);
        return view('lineanueva.edit',compact('user_id','user_nombre','date','hora','lineanuevas', 'usuarios','revisadoses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lineaNueva  $lineaNueva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','lineanueva.destroy');
        lineaNueva::destroy($id);

        return redirect()->route('lineanueva.index')
            ->with('status_success','registro successfully removed');
    }

    public function exportExcel()
    {
    return Excel::download(new LineaNuevaExport, 'lineanueva-list.xlsx');

    }


}
