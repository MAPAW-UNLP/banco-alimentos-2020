<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/modal.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  function close(){
    alert("entra");
    //var modalcss = document.getElementById("modalalerta");
    //modalcss.style.display = "none";
  }
function getHorarios(){
  $fecha=$("#selectTurnos").val();
  $URL='/getmsg/' + $fecha;
  $.ajax({
    type:'GET',
    url:$URL,
    success: function(data){
      var $select = $('#selectTurnoshorarios');
      $select.find('option').remove();
      data.forEach(obj => {
        console.log(Object.values(obj.horario)[1]);
        $select.append('<option value=' + obj.id + '>' + Object.values(obj.horario)[1] + '</option>');
        console.log('-------------------');
    });    
    }
  });
}
</script>
<script>
function submitjs(){
      var form = document.getElementById("myForm");
      var modalcss = document.getElementById("modalalerta");
      var inputTurno = document.getElementById("turno");
      var selectTurnos = document.getElementById("selectTurnoshorarios");
      inputTurno.value=selectTurnos.value;
      modalcss.style.display = "none";
      form.submit();
    }
    </script>
@include('main')
@include('components.header')
@include('components.nav')

<div class='general-container'>
@include('components.barra-izquierda')


    <!-- -->
    <div class='body'>
    <h3   >Solicitar Combo</h3>

<!-- modal -->
<div id="modalalerta" class="modalcss" style="display:none">
<!-- Modal content -->
<div class="modal-content">
  <!-- <span class="close">&times;</span> -->
  <div class="body-text-modal">
      Seleccione un turno
    <br>
      <select onchange="getHorarios()" name="selectTurnos" id="selectTurnos">
      @if (@isset($turnos))
        <option value=0>Seleccione una fecha</option>
        @foreach($turnos as $turno)
          <option value={{$turno->fechaHora}}  >{{$turno->fechaHora}}</option>
        @endforeach
      @endif
      </select>
      <select name="selectTurnoshorarios" id="selectTurnoshorarios">
      </select>
  </div>
  <div class="buttons-section">
    <button id="cancel" class="cancel" onclick='$("#modalalerta").css( "display", "none" );' >Cerrar</button>
    <button id="modal-button" onclick="submitjs()"  class="accept">Aceptar</button>
  </div>
</div>

</div>


<!-- modal -->
    <!-- -->
    <div class='body-form'>
    @if($sinOrga ?? '' == 1)
      No cuenta con una organizacion asociada a su usuario.
    @else
        <div class='body-form-combo'>

        <form action="{{url('/pedidos')}}" method="post" id="myForm">
        {{method_field('POST')}}
            {{csrf_field()}}
            <input type="number" id="turno" name="turno" style="display:none">
            <div class="container">
              <div class="row">
              <table class="table "name="cantPersonas" style="text-align:center;">
                      <thead>
                          <tr>
                          <th>Combo</th>
                          <th>Productos</th>
                          <th>Contribucion</th>
                          <th>Cantidad disponible</th>
                          <th>Cantidad pedidos</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($combos as $combo)
                      <tr>
                        <td>{{ $combo->nombre }}</td>
                        <td>
                          <p>
                            <a data-toggle="collapse" href="#a{{$combo->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Ver productos
                            </a>
                          </p>
                          <div class="collapse" id="a{{$combo->id}}">
                            <div class="card card-body" style="width:300px;">
                              @foreach($combo->productos as $producto)
                               {{$producto->cantidad}} - {{$producto->producto}}</p>
                              @endforeach
                            </div>
                          </div>
                        </td>
                        <td>{{ $combo->contribucion }}</td>
                        @if ($combo->stock > $combo->cantOrg)
                          <td>{{ $combo->cantOrg }}</td>
                        @else
                          <td>{{ $combo->stock }}</td>
                        @endif
                        <td>
                          <div class="form-group col-md-12">
                          @if ($combo->stock > $combo->cantOrg)
                            <input type="number" onChange="javascript:limite({{$combo->id}});" style="width:50px; height:30px;" value="0"  min="0" max="{{$combo->cantOrg}}" pattern="^[0-9]+" class="form" id="cantidad{{$combo->id}}" name="cantidad[]">  
                          @else
                            <input type="number" onChange="javascript:limite({{$combo->id}});" style="width:50px; height:30px;" value="0"  min="0" max="{{$combo->stock}}" pattern="^[0-9]+" class="form" id="cantidad{{$combo->id}}" name="cantidad[]">
                          @endif

                          </div>
                        </td>
                        <td style="display:none">
                            <input  id="combo" name="combo[]" value={{$combo->id}}>
                        </td>
                      </tr>
                      <br>
                      <br>
                      @endforeach
                      </tbody>
                  </table>

              </div>
              </div>
          </div>
          <br>
          <br>
          <div class='combo-edit-buttons-section'>
            <input type='button' class='cancel' onclick="window.location='{{ url("combos") }}'" value="Cancelar">
            <input type="button" class='accept button-open-modal'  onclick="run()" value="Aceptar">
          </div>
        </form>
      </div>
    </div>


    <script>
        function limite(param){
            $valor = "cantidad" + param;
            $max = document.getElementById($valor).max;
            $solicito = document.getElementById($valor).value;
            if (parseInt($max) < parseInt($solicito)){
                alert("No puede solicitar mas de " + $max + " combos");
                document.getElementById($valor).value=document.getElementById($valor).max;
            }
            
        }
    </script>
    <script>



    </script>
    <script>

      //window.onclick = function(event) {
      //  if (event.target == modalcss) {
      //    modalcss.style.display = "none";
      //  }
      //}


      function run(){
        var totalPoints = 0;
        $('.body-form-combo').each(function(){
          
          $(this).find('.form').each(function(){
            totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
          });
        });
        if (totalPoints > 0){
          var modalcss = document.getElementById("modalalerta");
          modalcss.style.display = "block";}
        else{
          alert("Debe seleccionar al menos un combo");
        }

        // redireccionamiento a url


      }


    </script>



    <!-- modulo modal -->
    @endif
</div>

  </div>
</div>
@include('components.footer')
