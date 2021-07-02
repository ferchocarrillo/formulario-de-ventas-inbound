<?php

namespace App\Http\Controllers;

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
use Carbon\Carbon;
use App\User;
use stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PortaExport;



class PortaController extends Controller
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

        $portas = Porta::orderBy('revisados', 'asc')->paginate(10);
        return view('porta.index',compact('portas','depto','tipoCliente','origen','planadquiere', 'usuarios'));



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



        return view('porta.create',compact('hora','date','user_nombre','user_id','depto','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    public function search( Request $request)
    {
        $portas = Porta::all();

        $search = $request->get('search');
        $portas= Porta::firstOrNew()->where('numero', 'like', '%'.$search.'%')->paginate(5);
        return view('porta.index', ['portas' => $portas]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosporta=request()->except('_token');

        if($request->hasFile('confronta')){
            $datosporta['confronta']=$request->file('confronta')->store('uploads','public');
        }

        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        Porta::insert($datosporta);
        //return response()->json($datosporta);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Porta $portas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portas = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','porta.edit');
        $portas=Porta::findOrFail($id);
        return view('porta.edit',compact('portas','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {

        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $portas = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','porta.edit');
        $portas=Porta::findOrFail($id);
        return view('porta.edit',compact('user_id','user_nombre','date','hora','portas','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        Porta::where('id','=',$id)->update($datosPorta);
        $portas=Porta::findOrFail($id);
        return view('porta.edit',compact('user_id','user_nombre','date','portas','revisadoses', 'usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','porta.destroy');
        Porta::destroy($id);

        return redirect()->route('porta.index')
            ->with('status_success','registro successfully removed');
    }
 /**
     * Display the specified resource.
     *
     * @param  \App\Porta $portas
     * @return \Illuminate\Http\Response
     */
        public function view ($id)

{

        $portas = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','porta.edit');



       $portas=Porta::findOrFail($id);
        return view('porta.edit',compact('portas','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
}

public function exportExcel()
{
return Excel::download(new PortaExport, 'porta-list.xlsx');

}



}
