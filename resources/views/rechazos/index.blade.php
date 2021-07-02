@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <h6>Cantidad de Registros:  {{ $rechazos->total() }}</h6>
                <br>
                <div class="col-md-4"   >
                <form action="/searchrechazos" method="GET">
                <div class="input-group">
        <input type="searchrechazos" name="searchrechazos" class="form-control">
        <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
        </div>
    </form>
</div>
<br>
        <table class="table table-ligth table-hover">
        <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Numero</th>
        <th scope="col">Nombres</th>
        <th scope="col">Documento</th>
        <th scope="col">Causal</th>
        <th scope="col">Linea</th>
        <th scope="col">Fecha rechazo</th>
        <th scope="col">Modalidad</th>
        <th scope="col">Agente</th>
        <th colspan="3">Acciones</th>
       </tr>
    </thead>
  <tbody>
    @foreach ($rechazos as $rechazo)
<tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$rechazo->numero_de_celular}}</td>
        <td>{{$rechazo->nombres}}</td>
        <td>{{$rechazo->documento}}</td>
        <td>{{$rechazo->causal}}</td>
        <td>{{$rechazo->linea}}</td>
        <td>{{$rechazo->frechazo}}</td>
        <td>{{$rechazo->modalidad}}</td>
        <td>{{$rechazo->agente}}</td>
        <td>
            <form action="{{url('/rechazos/'.$rechazo->id)}}" method="post" style='display:inline'>
                @csrf
                @method('DELETE')

        <a href="{{url('/rechazos/'.$rechazo->id.'/edit')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Editar</a>
        <button class="btn btn-warning btn-sm" onclick="return confirm('Borrar?');" type="submit"aria-pressed="true">Borrar</button>
       </form>
        </td>
     </tr>
@endforeach
</tbody>
</table>

{{  $rechazos->links()  }}
        </div>
    </form>
    <p>
        clic <a href="{{route('rechazos.excel')}}">Aqui</a>
        para descargar en Excel la base de Rechazos
        </p>
    <script src="{{asset('js/app.js')}}"></script>
</body>
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
Swal.fire(
'RECHAZOS',
'Lista de Rechazos',
'success'
)
</script>
@stop
@endsection

