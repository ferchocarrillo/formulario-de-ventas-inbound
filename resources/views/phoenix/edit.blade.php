@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
            </body>
            <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <img src="\theme\images\pngegg.png" float="left" height="120" width="300">
                <h3 aline="center">Editar Gestion de Phoenix</h3>
            </center>



<form name="f1" action="{{ url('/phoenix/'.$phoenixes->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('PATCH')
    <input type="hidden" id="backoffice" name="backoffice" value="{{ $user_id}}">
   <div class="form-row">
   <div class="form-group col-md-6">
        <label for="number">Numero</label>
        <input type="number" class="form-control-new"
        id="numero"
        placeholder="Numero"
        name="numero"
        value="{{ old('numero', $phoenixes->numero)}}">
   </div>

  <div class="form-group col-md-6">
    <label for="documento">Documento</label>
       <input type="number"
       class="form-control-new"
       id="documento"
       placeholder="Documento"
       name="documento"
       value="{{ old('documento' , $phoenixes->documento)}}">

  </div>
  <div class="form-group col-md-6">
    <label for="nombres">Nombres</label>
       <input type="text"
       class="form-control-new"
       id="nombres"
       placeholder="Nombres"
       name="nombres"
       value="{{ old('nombres' , $phoenixes->nombres)}}">

  </div>
  <div class="form-group col-md-6">
    <label for="apellidos">Apellidos</label>
       <input type="text"
       class="form-control-new"
       id="apellidos"
       placeholder="Apellidos"
       name="apellidos"
       value="{{ old('apellidos' , $phoenixes->apellidos)}}">

  </div>
  <div class="form-group col-md-6">
    <label for="correo">Correo</label>
       <input type="text"
       class="form-control-new"
       id="correo"
       placeholder="Correo"
       name="correo"
       value="{{ old('correo' , $phoenixes->correo)}}">
  </div>
  <div class="form-group col-md-6">
    <label for="selector">Selector</label>
       <input type="text"
       class="form-control-new"
       id="selector"
       placeholder="Selector"
       name="selector"
       value="{{ old('selector' , $phoenixes->selector)}}">
  </div>


  <div class="form-group col-md-6">
    <label for="departamento">Departamento</label>
       <input type="text"
       class="form-control-new"
       id="departamento"
       placeholder="Departamento"
       name="departamento"
       value="{{ old('departamento' , $phoenixes->departamento)}}">
  </div>

  <div class="form-group col-md-6">
    <label for="ciudad">Ciudad</label>
       <input type="text"
       class="form-control-new"
       id="id_ciudad"
       placeholder="ciudad"
       name="id_ciudad"
       value="{{ old('id_ciudad' , $phoenixes->id_ciudad)}}">
  </div>
  <div class="form-group col-md-6">
    <label for="barrio">Barrio</label>
       <input type="text"
       class="form-control-new"
       id="barrio"
       placeholder="barrio"
       name="Barrio"
       value="{{ old('barrio' , $phoenixes->barrio)}}">
  </div>
  <div class="form-group col-md-6">
    <label for="direccion">Direccion</label>
       <input type="text"
       class="form-control-new"
       id="direccion"
       placeholder="direccion"
       name="Direccion"
       value="{{ old('direccion' , $phoenixes->direccion)}}">
  </div>
  <div class="form-group col-md-6">
    <label for="nip">Nip</label>
       <input type="number"
       class="form-control-new"
       id="nip"
       placeholder="Nip"
       name="nip"
       value="{{ old('nip' , $phoenixes->nip)}}">
  </div>
  <div class="form-group col-md-6">
    <label for="tipocliente">Tipo cliente</label>
       <input type="text"
       class="form-control-new"
       id="tipocliente"
       placeholder="tipo cliente"
       name="tipocliente"
       value="{{ old('tipocliente' , $phoenixes->tipocliente)}}">
  </div>

  <div class="form-group col-md-6">
    <label for="ncontacto">Numero de contacto</label>
       <input type="number"
       class="form-control-new"
       id="ncontacto"
       placeholder="numero de contacto"
       name="ncontacto"
       value="{{ old('ncontacto' , $phoenixes->ncontacto)}}">
  </div>


  <div class="form-group col-md-6">
    <label for="imei">Modelo</label>
       <input type="text"
       class="form-control-new"
       id="modelo"
       placeholder="modelo"
       name="modelo"
       value="{{ old('modelo' , $phoenixes->modelo)}}">
  </div>

  <div class="form-group col-md-3">
    <label for="planadquiere">Tipo de Planes</label>
       <input type="text"
       class="form-control-new"
       id="planadquiere"
       placeholder="Tipo de Planes"
       name="planadquiere"
       value="{{ old('planadquiere' , $phoenixes->planadquiere)}}">
  </div>
  <div class="form-group col-md-3">
    <label for="tipoPagos">Tipo de Pago</label>
       <input type="text"
       class="form-control-new"
       id="tipoPagos"
       placeholder="Tipo de Pago"
       name="tipoPagos"
       value="{{ old('tipoPagos' , $phoenixes->tipoPagos)}}">
  </div>



  <div class="form-group col-md-3">
    <label for="ngrabacion">Numero de grabacion</label>
       <input type="number"
       class="form-control-new"
       id="ngrabacion"
       placeholder="Numero de grabacion"
       name="ngrabacion"
       value="{{ old('ngrabacion' , $phoenixes->ngrabacion)}}">
  </div>
  <div class="form-group col-md-3">
    <label for="orden">Numero de Orden</label>
       <input type="number"
       class="form-control-new"
       id="orden"
       placeholder="Numero de Orden"
       name="orden"
       value="{{ old('orden' , $phoenixes->orden)}}">
  </div>

  <div class="form-group col-md-12">
    <label for="ngrabacion">Observaciones</label>
    <input type="text"
    class="form-control-new"
    id ="observaciones"
    name="observaciones"
    placeholder="Observaciones"
    value="{{ old('observaciones' , $phoenixes->observaciones)}}">
   </div>

   <div class="form-group col-md-4">
    <label for="revisados">Revision</label>

     <select name="revisados" id="revisados" class="form-control-new"  required>
        <option value="">Selecciona una</option>
        @foreach($revisadoses as $revisados)
            <option value="{{ $revisados->estado}}">{{ $revisados->estado }}</option>
        @endforeach
  </select>
    </div>

    <div class="form-group col-md-4">
     <label for="estadorevisados">Estado de la revision</label>
     <select name="estadorevisado" id="estadorevisado" class="form-control-new" placeholder="Estado de la revisión" required></select>
 </div>

 <div class="form-group col-md-4">
    <span><label for="confronta">Confronta</label><br>

    <a href="{{ asset('storage').'/'.$phoenixes->confronta}}"><img src="{{ asset('storage').'/'.$phoenixes->confronta}}" alt="" height="130" width="300"></a>
</span>
</div>
<div class="form-group col-md-12">
    <textarea class="form-control-new"  id ="obs2" name="obs2" rows="3" placeholder="Observaciones BackOficce"></textarea>
    </div>

<input class="btn btn-lg btn-primary" type="submit" value="EDITAR">


<a href="{{route('phoenix.index')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">VOLVER</a>

</div>

</form>


</div>

</form>



<script src="{{asset('js/app.js')}}"></script>
        </body>
        @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
        @section('js')



<script>
Swal.fire(
  'PORTABILIDAD DIGITAL',
  'Aqui podras editar los datos ya registrados',
  'success'
)
</script>
@stop
<!-- Bootstrap CSS-->
    <link href="{{ asset('theme/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<!-- Bootstrap JS-->
    <script src="{{asset('theme/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('theme/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!--<script src="{{asset('js/Portabilidad.js')}}"></script>-->

<script>
   $(document).ready(function() {
        $('#id_dep').on('change', function(e) {
            var id = $('#id_dep').val();
            $.ajax({

                url: "{{ route('Ciudad')}}",
                data: "id="+id+"&_token={{ csrf_token()}}",
                dataType: "json",
                method: "POST",
                success: function(result)
                {

                    $('#id_ciudad').empty();
                    $('#id_ciudad').append("<option value=''>Ingrese Ciudad o Municipio</option>");
                    $.each(result, function(index,value){

                        $('#id_ciudad').append("<option value='"+value.Id_ciudad+"'>"+value.Municipio+"</option>");
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
         $('#revisados').on('change', function(e) {
             var id = $('#revisados').val();
             $.ajax({

                 url: "{{ route('Revisado')}}",
                 data: "id="+id+"&_token={{ csrf_token()}}",
                 dataType: "json",
                 method: "POST",
                 success: function(result)
                 {

                     $('#estadorevisado').empty();
                     $('#estadorevisado').append("<option value=''>Escoja una Opcion</option>");
                     $.each(result, function(index,value){

                         $('#estadorevisado').append("<option value='"+value.estado+"'>"+value.estado+"</option>");
                     });
                 }
             });
         });
     });
 </script>
@endsection

