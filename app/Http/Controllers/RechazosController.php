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
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RechazosExport;


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
        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $causales = Causales::all();
        $linea = Linea::all();
        $usuarios = User::all();
        $depto = Departamentos::all();

        return view('rechazos/create',compact('user_nombre','user_id','hora','date','causales','linea','depto'));
    }
    public function searchrechazos( Request $request)
    {

        $rechazos = Rechazos::all();
        $searchrechazos = $request->get('searchrechazos');
        $rechazos= Rechazos::firstOrNew()->where('numero_de_celular', 'like', '%'.$searchrechazos.'%')->paginate(5);
        return view('rechazos.index', ['rechazos' => $rechazos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;

        $datosrechazos=request()->except('_token');

        if($request->hasFile('imgrechazo')){
            $datosrechazos['imgrechazo']=$request->file('imgrechazo')->store('uploads','public');
        }
    Rechazos::insert($datosrechazos);
        return back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rechazos  $rechazos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('haveaccess','rechazos.edit');
        $rechazos=Rechazos::findOrFail($id);
        return view('rechazos.edit',compact('rechazos'));
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
    public function destroy($id)
    {
        $this->authorize('haveaccess','rechazos.destroy');
        Rechazos::destroy($id);

        return redirect()->route('rechazos.index')
            ->with('status_success','registro successfully removed');
}

public function exportExcel()
{
return Excel::download(new RechazosExport, 'rechazos-list.xlsx');

}
}
