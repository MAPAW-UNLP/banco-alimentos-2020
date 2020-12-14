<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/calendar.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>
<script>
    function changeStatus($path) {
        window.location=$path;
    }
</script>
<script>
function myFunction(param) {
  var checkBox = document.getElementById("defaultCheck"+String(param));
  var id="cant"+String(checkBox.value);
  var cant = document.getElementById(id);
  if (checkBox.checked == true){
    cant.value=2;
  } else {
    cant.value=0;
  }
}
function cambio(param) {
  var cant = document.getElementById("cant"+String(param));
  var checkBox = document.getElementById("defaultCheck"+String(param));
  if (cant.value==0){
    checkBox.checked=false;
  }else{
    checkBox.checked=true;
  }
}
</script>
<script>
$(function () {
    @if(isset($vAnio))
        var dia={{$vDia}};
        var date = new Date({{$vAnio}}, {{$vMes}}-1, {{$vDia}});
        if (dia.toString().length == 1){
            var strDat= {{$vAnio}}+"-"+{{$vMes}}+"-0"+{{$vDia}};
        }else{
            var strDat= {{$vAnio}}+"-"+{{$vMes}}+"-"+{{$vDia}};
        }
        $("#fechaHora").val(strDat);
    @else
        var date = new Date();
    @endif

    $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            defaultDate: date,
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            onSelect: function (date) {
            $("#fechaHora").val(date);
            window.location="{{url('/turnos/ver')}}"+"/"+$("#fechaHora").val();
        },
    });
});
</script>
<div class='general-container'>
@include('components.barra-izquierda')
        <div>
            <nav class='top-menu'>
                <div>
                    <a href="{{ url('/combos') }}" class='top-menu-item'>
                        <p class='top-menu-text-item'>Listado</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/calendar') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Calendario</b></p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/notificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificaciones</p>
                    </a>
                </div>
            </nav>
            <form action="{{url('/turnos')}}" method="POST">
            {{method_field('POST')}}
            {{csrf_field()}}
            <div class='body body-calendar'>
            <h3>Calendario</h3>
                <div class="row" allign="center">                    
                    <div class="col">
                        <h5>Seleccionar día</h5>
                        <div id="datepicker" name="datepicker" slected="1"></div>
                        <input type="date" id="fechaHora" name="fechaHora" style="display:none;">
                    </div>
                    <div class="col">
                        <h5>Seleccionar horario</h5>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0" style="background-color: #FFFFFF; text-align:center;">
                          <thead>
                              <tr>
                                  <th scope="col">Horarios</th>
                                  <th scope="col">Cantidad</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($horarios as $horario)
                              @php
                                  $check = 0;
                              @endphp
                              @if(isset($turnos))
                                  @foreach($turnos as $turno)
                                      @if($turno->horario_id==$horario->id)
                                          @php
                                              $check = 1;
                                              $cantComb = $turno->cantTurnos;
                                          @endphp
                                      @endif
                                  @endforeach
                              @endif
                              @if($check==1)
                                  <tr>
                                      <td scope="row" style=" text-align:left;">

                                              <input type="checkbox" name="check[]" value="{{$horario->id}}" id="defaultCheck{{$horario->id}}" onclick="myFunction({{$horario->id}})" checked>
                                              <label class="form-check-label" for="defaultCheck1">
                                                  <b>{{$horario->nombre}}</b>
                                              </label>
                                              <br>
                                      </td>
                                      <td>
                                          <select name="cant[]" id="cant{{$horario->id}}" onchange="cambio({{$horario->id}})">
                                              @for ($i = 0; $i <= 4; $i++)
                                              @if ($cantComb == $i)
                                                      <option value="{{ $i }}"  selected>{{ $i }}</option>
                                                  @else
                                                      <option value="{{ $i }}">{{ $i }}</option>
                                                  @endif
                                              @endfor
                                          </select>
                                          <br>
                                      </td>
                                  </tr>
                              @else                                <tr>
                                      <td scope="row" style=" text-align:left;">
                                              <input type="checkbox" name="check[]" value="{{$horario->id}}" id="defaultCheck{{$horario->id}}" onclick="myFunction({{$horario->id}})">
                                              <label class="form-check-label" for="defaultCheck1">
                                                  <b>{{$horario->nombre}}</b>
                                              </label>
                                              <br>
                                      </td>
                                      <td>
                                          <select name="cant[]" id="cant{{$horario->id}}" onchange="cambio({{$horario->id}})">
                                              @for ($i = 0; $i <= 4; $i++)
                                                      <option value="{{ $i }}">{{ $i }}</option>
                                              @endfor
                                          </select>
                                          <br>
                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                          </tbody>
                      </table>
</div>
<br>
<br>
                       
                    </div>
                </div>
                <div class='calendar-buttons-section'>
                    <button class='cancel' type="reset">Cancelar</button>
                    <button class='accept'>Guardar</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>



<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>


<style>
.my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
