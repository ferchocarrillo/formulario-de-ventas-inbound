<?php

namespace App\Http\Controllers;

use App\JhonatanPermission\Models\Prepost;
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
use App\Revisados;
use App\Velocidad;
use App\Planes_prepost;
use App\Estrato;
use App\Activacion;
use App\Tecnologia;
use App\Adicionales;
use App\Producto;
use App\Planadquiere;
use App\Revisiones;
use App\Corte;
use App\User;
use stdClass;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PrepostExport;

class PrepostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $corte = Corte::all();
        $estrato = Estrato::all();
        $velocidad = Velocidad::all();
        $tecnologia = Tecnologia::all();
        $producto = Producto::all();
        $adicionales = Adicionales::all();
        $activacion = Activacion::all();
        $tipoCliente = Tipocliente::all();
        $plan = Planes_prepost::all();
        $usuarios = User::all();
        $user_id = Auth::user()->id;

        $preposts = Prepost::orderBy('revisados', 'asc')->paginate(10);
        return view('prepost.index',compact('preposts','corte','estrato','tipoCliente','velocidad','producto','adicionales', 'activacion','plan', 'usuarios'));
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
        $corte = Corte::all();
        $estrato = Estrato::all();
        $velocidad = Velocidad::all();
        $tecnologia = Tecnologia::all();
        $producto = Producto::all();
        $adicionales = Adicionales::all();
        $activacion = Activacion::all();
        $tipocliente = Tipocliente::all();
        $plan = Planes_prepost::all();
        $usuarios = User::all();
        $user_id = Auth::user()->id;
        return view('prepost.create',compact('hora','date','user_nombre','user_id','depto','plan','activacion','estrato','velocidad','tipocliente','tecnologia','producto', 'corte','adicionales','usuarios'));

    }

    public function searchprepost( Request $request)
    {
        $preposts = Prepost::all();

        $searchprepost = $request->get('searchprepost');
        $preposts= Prepost::firstOrNew()->where('numero', 'like', '%'.$searchprepost.'%')->paginate(5);
        return view('prepost.index', ['preposts' => $preposts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;

        $datosprepost=request()->except('_token');

        if($request->hasFile('confronta')){
            $datosprepost['confronta']=$request->file('confronta')->store('uploads','public');
        }

        Prepost::insert($datosprepost);
        return back() ;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prepost = Prepost::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();
        $this->authorize('haveaccess','porta.edit');
        $prepost = Prepost::findOrFail($id);
        return view('porta.edit',compact('prepost','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {

        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $prepost = Prepost::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','prepost.edit');



       $prepost=Prepost::findOrFail($id);
        return view('prepost.edit',compact('user_id','user_nombre','date','hora','prepost','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prepost  $prepost
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
        $datosPrepost=request()->except(['_token','_method']);
        Prepost::where('id','=',$id)->update($datosPrepost);
        $prepost=Prepost::findOrFail($id);
        return view('prepost.edit',compact('user_id','date','hora','prepost', 'usuarios','revisadoses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','prepost.destroy');
        Prepost::destroy($id);

        return redirect()->route('prepost.index')
            ->with('status_success','registro successfully removed');
    }

    public function exportExcel()
{
return Excel::download(new PrepostExport, 'prepost-list.xlsx');

}
}
