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
                <h3 aline="center">Ver Registros Rechazados</h3>
            </center>

<form name="f1" action="{{ url('/rechazos/'.$rechazos->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('PATCH')

    <div class="form-row">
   <div class="form-group col-md-3">
       <label for="numero_de_celular">Numero de Celular</label>
        <input type="number" class="form-control-new"
        id="numero_de_celular"
        placeholder="Numero de Celular"
        name="numero_de_celular"
        value="{{ old('numero_de_celular', $rechazos->numero_de_celular)}}">
    </div>
    <div class="form-group col-md-6">
        <label for="nombres">Nombre</label>
         <input type="text" class="form-control-new"
         id="nombres"
         placeholder="nombres"
         name="nombres"
         value="{{ old('nombres', $rechazos->nombres)}}">
        </div>
    <div class="form-group col-md-3">
        <label for="documento">Numero</label>
         <input type="number" class="form-control-new"
         id="documento"
         placeholder="documento"
         name="documento"
         value="{{ old('documento', $rechazos->documento)}}">
        </div>

        <div class="form-group col-md-3">
            <label for="causal">Causal</label>
             <input type="text" class="form-control-new"
             id="causal"
             placeholder="Causal"
             name="causal"
             value="{{ old('causal', $rechazos->causal)}}">
         </div>

         <div class="form-group col-md-3">
            <label for="linea">Linea</label>
               <input type="text"
               class="form-control"
               id="linea"
               placeholder="linea"
               name="linea"
               value="{{ old('linea' , $rechazos->linea)}}">
            </div>

         <div class="form-group col-md-3">
              <label for="departamento">Numero</label>
              <input type="text" class="form-control-new"
              id="departamento"
              placeholder="Departamento"
              name="departamento"
              value="{{ old('departamento', $rechazos->departamento)}}">
            </div>
         <div class="form-group col-md-3">
              <label for="id_ciudad">Ciudad</label>
              <input type="text" class="form-control-new"
              id="id_ciudad"
              placeholder="Ciudad"
              name="id_ciudad"
              value="{{ old('id_ciudad', $rechazos->id_ciudad)}}">
            </div>

        <div class="form-group col-md-1">
            <label for="claro">Claro</label>
            <input type="text" class="form-control-new"
            id="claro"

            name="claro"
            value="{{ old('claro', $rechazos->claro)}}">
           </div>

           <div class="form-group col-md-1">
            <label for="tigo">Tigo</label>
            <input type="text" class="form-control-new"
            id="tigo"

            name="tigo"
            value="{{ old('tigo', $rechazos->tigo)}}">
           </div>

           <div class="form-group col-md-1">
            <label for="directv">Direct tv</label>
            <input type="text" class="form-control-new"
            id="directv"

            name="directv"
            value="{{ old('directv', $rechazos->directv)}}">
           </div>

           <div class="form-group col-md-1">
            <label for="wow">Wow</label>
            <input type="text" class="form-control-new"
            id="wow"

            name="wow"
            value="{{ old('wow', $rechazos->wow)}}">
           </div>


           <div class="form-group col-md-2">
            <label for="barrio">S. de Barrio</label>
            <input type="text" class="form-control-new"
            id="barrio"

            name="barrio"
            value="{{ old('barrio', $rechazos->barrio)}}">
           </div>

           <div class="form-group col-md-1">
            <label for="otro">Otro</label>
            <input type="text" class="form-control-new"
            id="otro"

            name="otro"
            value="{{ old('otro', $rechazos->otro)}}">
           </div>

           <div class="form-group col-md-2">
            <label for="modalidad">Modalidad</label>
            <input type="text" class="form-control-new"
            id="modalidad"
            placeholder="Modalidad"
            name="modalidad"
            value="{{ old('modalidad', $rechazos->modalidad)}}">
           </div>

           <div class="form-group col-md-3">
            <label for="frechazo">fecha rechazo</label>
            <input type="date" class="form-control-new"
            id="frechazo"
            placeholder="fecha rechazo"
            name="frechazo"
            value="{{ old('frechazo', $rechazos->frechazo)}}">
           </div>


           <div class="form-group col-md-6">
            <label for="observacion">Observacion</label>
            <input type="text" class="form-control-new"
            id="observacion"
            placeholder="observacion"
            name="observacion"
            value="{{ old('observacion', $rechazos->observacion)}}">
           </div>






 <div class="form-group col-md-6">
    <label for="imgrechazo">Imagen Rechazos</label>
    <span>
        <a href="{{ asset('storage').'/'.$rechazos->imgrechazo}}"><img src="{{ asset('storage').'/'.$rechazos->imgrechazo}}" alt="" height="130" width="260"></a>
    </span>
    </div>

    </div>


    <input class="btn btn-lg btn-primary" type="submit" value="EDITAR">


    <a href="{{route('rechazos.index')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">VOLVER</a>



    </form>
    <script>
        var estadorevisados_1=new Array("Ok");
        var estadorevisados_2=new Array("Escoja una opcion","Cliente en mora","Error Aplicativo","Recahzo PCO","Cliente no Paso Confronta","Pendiente Ingreso");
        var estadorevisados_3=new Array("Escoja una opcion","Rechazo PCO","Cliente Tiene una Solicitud Abierta");


        var todasestadorevisados = [
          [],
          estadorevisados_1,
          estadorevisados_2,
          estadorevisados_3,

        ];

        function cambia_estadorevisado(){
             //tomo el valor del select del revisado elegido
             var revisado
             revisado = document.f1.revisado[document.f1.revisado.selectedIndex].value
             //miro a ver si el revisado está definido
             if (revisado != 0) {
                //si estaba definido, entonces coloco las opciones de la estadorevisado correspondiente.
                //selecciono el array de estadorevisado adecuado
                mis_estadorevisados=todasestadorevisados[revisado]
                //calculo el numero de estadorevisados
                num_estadorevisados = mis_estadorevisados.length
                //marco el número de estadorevisados en el select
                document.f1.estadorevisado.length = num_estadorevisados
                //para cada estadorevisado del array, la introduzco en el select
                for(i=0;i<num_estadorevisados;i++){
                   document.f1.estadorevisado.options[i].value=mis_estadorevisados[i]
                   document.f1.estadorevisado.options[i].text=mis_estadorevisados[i]
                }
             }else{
                //si no había estadorevisado seleccionada, elimino las estadorevisados del select
                document.f1.estadorevisado.length = 1
                //coloco un guión en la única opción que he dejado
                document.f1.estadorevisado.options[0].value = "-"
                document.f1.estadorevisado.options[0].text = "-"
             }
             //marco como seleccionada la opción primera de estadorevisado
             document.f1.estadorevisado.options[0].selected = true
      }
      </script>


      </div>

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
        'UPGRADE',
        'Aqui podras editar los datos ya registrados',
        'success'
      )
      </script>
      @stop
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


