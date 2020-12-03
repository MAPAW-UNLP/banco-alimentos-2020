<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/modal.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
      <select name="selectTurnos" id="selectTurnos">
        @foreach($turnos as $turno)
          <option value={{$turno->id}}>{{$turno->fechaHora}} - {{$turno->horario->nombre}}</option>
        @endforeach
      </select>
  </div>
  <button id="modal-button" onclick="submitjs()" style="
    position: relative;
    top: 20%;
    width: 70px;
    left: 70%;
    font-size: 15px" class="close-modal   btn-modal-style">Aceptar</button>
</div>

</div>


<!-- modal -->
    <!-- -->
    <div class='body-form'>
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
                          <th>Cantidad máxima</th>
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
                        <td>{{ $combo->cantOrg }}</td>
                        <td>
                          <div class="form-group col-md-12">
                            <input type="number" onChange="javascript:limite({{$combo->id}});" style="width:50px; height:30px;" value="0"  min="0" max="{{$combo->cantOrg}}" pattern="^[0-9]+" class="form" id="cantidad{{$combo->id}}" name="cantidad[]">
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
            <input type="button" class='accept-combo  button-open-modal'  onclick="run()" value="Aceptar">
            <input type='button' class='cancel-combo' onclick="window.location='{{ url("combos") }}'" value="Cancelar" style="color:white; border-color:#dc3545;">

          </div>
        </form>
      </div>
    </div>


    <script>
        function limite(param){
            $valor = "cantidad" + param;
            $max = document.getElementById($valor).max;
            $solicito = document.getElementById($valor).value;
            if (int($max) < int($solicito)){
                alert("No puede solicitar mas de " + $max + " combos");
            }
        }
    </script>
    <script>



      var button = document.getElementsByClassName("close-modal")[0];


      button.onclick = function() {
        var form = document.getElementById("myForm");
        var modalcss = document.getElementById("modalalerta");
        var inputTurno = document.getElementById("turno");
        var selectTurnos = document.getElementById("selectTurnos");
        inputTurno.value=selectTurnos.value;
        modalcss.style.display = "none";
        form.submit();
      }


      //window.onclick = function(event) {
      //  if (event.target == modalcss) {
      //    modalcss.style.display = "none";
      //  }
      //}


      function run(){
        var modalcss = document.getElementById("modalalerta");
        modalcss.style.display = "block";

        // redireccionamiento a url


      }
    </script>



    <!-- modulo modal -->

</div>

  </div>
</div>
@include('components.footer')
