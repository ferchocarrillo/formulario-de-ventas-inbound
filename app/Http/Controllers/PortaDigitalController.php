<?php

namespace App\Http\Controllers;

use App\PortaDigital;
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
use App\Exports\PortaDigitalExport;

class PortaDigitalController extends Controller
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
        $portadigitals = PortaDigital::orderBy('revisados', 'asc')->paginate(10);
        return view('portadigital.index',compact('portadigitals','depto','tipoCliente','origen','planadquiere', 'usuarios'));
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
        return view('portadigital.create',compact('hora','date','user_nombre','user_id','depto','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    public function searchportadigital( Request $request)
    {
        $portadigitals = PortaDigital::all();
        $searchportadigital = $request->get('searchportadigital');
        $portadigitals= PortaDigital::firstOrNew()->where('numero', 'like', '%'.$searchportadigital.'%')->paginate(5);
        return view('portadigital.index', ['portadigitals' => $portadigitals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Portadigital $portadigitals)
    {
        $datosportadig=request()->except('_token');
        if($request->hasFile('confronta')){
            $datosportadig['confronta']=$request->file('confronta')->store('uploads','public');
        }
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        PortaDigital::insert($datosportadig);
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\PortaDigital  $portaDigital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portadigitals = PortaDigital::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','portadigital.edit');
        $portadigitals=PortaDigital::findOrFail($id);
        return view('portadigital.edit',compact('portadigitals','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PortaDigital  $portaDigital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $portadigitals = PortaDigital::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','portadigital.edit');
        $portadigitals=PortaDigital::findOrFail($id);
        return view('portadigital.edit',compact('user_id','user_nombre','date','hora','portadigitals','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PortaDigital  $portaDigital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;
        $revisadoses = Revisados::all();
        $datosPorta=request()->except(['_token','_method']);
        PortaDigital::where('id','=',$id)->update($datosPorta);
        $portadigitals=PortaDigital::findOrFail($id);
        return view('portadigital.edit',compact('user_id','user_nombre','date','portadigitals', 'usuarios','revisadoses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PortaDigital  $portaDigital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','portadigital.destroy');
        Porta::destroy($id);

        return redirect()->route('portadigital.index')
            ->with('status_success','registro successfully removed');
    }
    public function view ($id)

    {

        $portadigitals = PortaDigital::all();
            $depto = Departamentos::all();
            $tipoCliente = TipoCliente::all();
            $planadquiere = Planadquiere::all();
            $origen = Origen::all();
            $revisado = Revisados::all();
            $usuarios = User::all();


            $this->authorize('haveaccess','portadigital.edit');



           $portasdigital=PortaDigital::findOrFail($id);
            return view('portadigital.edit',compact('portadigitals','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    public function exportExcel()
    {
    return Excel::download(new PortaDigitalExport, 'portadigital-list.xlsx');

    }



    }
