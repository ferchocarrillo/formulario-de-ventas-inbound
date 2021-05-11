
@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<style>

card{
    border-radius: 0.95rem;
}

</style>
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
            </body>
            <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <img src="\theme\images\pngegg.png" float="left" height="120" width="300">
                <h3 aline="center">RECHAZOS</h3>
            </center>
                    <form action="{{ url('/rechazos')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" id ="numero_de_celular" name="numero_de_celular" class="form-control" placeholder="Numero de celular" required>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="text" id ="nombres" name="nombres" class="form-control"  placeholder="Nombres y Apellidos del Cliente" required>
                        </div>


                        <div class="form-group col-md-6">
                            <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento" required>
                        </div>

                        <div class="form-group col-md-6">

                        <select name="causal" id="causal" class="form-control"  required>
                            <option value="0">Causales de Rechazo</option>
                            @foreach($causales as $causal)
                                <option value="{{ $causal->causal}}">{{ $causal->causal }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group col-md-4">

                        <select name="linea" id="linea" class="form-control"  required>
                            <option value="0">Linea</option>
                            @foreach($linea as $lineas)
                                <option value="{{ $lineas->linea}}">{{ $lineas->linea }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select name="departamento" id="departamento" class="form-control"  required>
                               <option value="">Departamento</option>
                               @foreach($depto as $departamento)
                                   <option value="{{ $departamento->Nombre}}">{{ $departamento->Nombre }}</option>
                               @endforeach
                         </select>
                           </div>
                           <div class="form-group col-md-4">
                                 <select name="id_ciudad" id="id_ciudad" class="form-control" placeholder="Ciudad o municipio" required></select>
                             </div>
<div class="form-group col-md-6">
<div class="card" style="background: white; border-radius: 0.75rem">
    <label for="competencia">Comnpetencia</label>
    <div class="row">

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-check">
            <input class="form-check-input" type="checkbox" value="claro" name="claro" id="claro">
            <label class="form-check-label" for="claro">
              Claro
            </label>
          </div>&nbsp;&nbsp;&nbsp;
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="tigo" name="tigo" id="tigo">
            <label class="form-check-label" for="tigo">
              Tigo
            </label>
          </div>&nbsp;&nbsp;&nbsp;
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="directv" name="directv" id="directv">
            <label class="form-check-label" for="directv">
              Directv
            </label>
          </div>&nbsp;&nbsp;&nbsp;
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="wow" name="wow" id="wow">
            <label class="form-check-label" for="wow">
              Wow
            </label>
          </div>&nbsp;&nbsp;&nbsp;
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="barrio" name="barrio" id="barrio">
            <label class="form-check-label" for="barrio">
              Servicio de barrio
            </label>
          </div>&nbsp;&nbsp;&nbsp;
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="otros" name="otros" id="otros">
            <label class="form-check-label" for="otros">
              Otros
            </label>
          </div></div></div></div>

          <div class="form-group col-md-6">
            <div class="card" style="background: white; border-radius: 0.75rem">
                <label for="competencia">Modalidad de Gestión</label>
                <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="c2c" name="modalidad" id="modalidad1">
                        <label class="form-check-label" for="modalidad1">
                          C2C
                        </label>
                      </div>
                      &nbsp;&nbsp;&nbsp;
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="outbound" name="modalidad" id="modalidad2">
                        <label class="form-check-label" for="modalidad2">
                            OUTBOUND
                        </label>
                      </div>
                </div></div></div></div>
                <div  class="row">
                        <div class="col-sm-3 col-form-label">
                            <label for="frechazo">Fecha de rechazo</label>
                            </div>
                            <div class="form-group col-md-3">
                            <input type="date" id ="frechazo" name="frechazo" class="form-control" placeholder="Fecha del rechazo"required>
                          </div>

                            <div class="form-group col-md-6">
                                <textarea  id ="observacion" name="observacion" class="form-control" rows="3" placeholder="Observaciones" style="background: white"></textarea>
                            </div>
                        </form>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                 <i class="fa fa-dot-circle-o"></i> Enviar
                            </button>
                            <a href=({{ url('rechazos.create')}})><button type="reset"  class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> atras
                            </button></a>
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
          'RECHAZOS',
          'Consigna todos los datos de forma correcta',
          'success'
        )
        </script>
        @stop





        <script>
            $(document).ready(function() {
                 $('#departamento').on('change', function(e) {
                     var id = $('#departamento').val();
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

                                 $('#id_ciudad').append("<option value='"+value.Municipio+"'>"+value.Municipio+"</option>");
                             });
                         }
                     });
                 });
             });
         </script>
         @endsection

