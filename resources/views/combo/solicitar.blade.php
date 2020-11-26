<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/modal.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('main')
@include('components.header')
@include('components.nav')

<div class='general-container'>
  <div class='lateral-menu'>
  @can('role-create')
    <div>
      <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
        <p class='lateral-menu-text-item'>Agregar usuario</p>
      </a>
    </div>
  @endcan
  @can('orga-mis-solicitudes')
    <div>
      <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item'>                          
          <p class='lateral-menu-text-item'>Mis solicitudes</p>              
      </a>
    </div>
  @endcan
  @can('orga-mis-datos')
    <div>
      <a href="{{ url('/registro') }}" class='lateral-menu-item'>         
          <p class='lateral-menu-text-item'>Modificar mis datos</p>
      </a>
    </div>
  @endcan
  @can('organizacion-list') 
    <div>
      <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
        <p class='lateral-menu-text-item'>Gestion área social</p>
      </a>
    </div>
  @endcan
  @can('combo-list')
    <div>
      <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>                          
        <p class='lateral-menu-text-item'><b>Combos</b></p>              
      </a>
    </div>
  @endcan
  @can('orga-solicitar-combo')
    <div>
        <a href="{{ url('/') }}" class='lateral-menu-item'>
            <p class='lateral-menu-text-item'>Solicitar Combo</p>
        </a>
      </div>
  @endcan
    <div>
  
      <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
        <p class='lateral-menu-text-item'>Cambiar contraseña</p>
      </a>
    </div>
  </div>
  <div>
    <nav class='top-menu'>
      <div>
        <a href="{{ url('/combos') }}" class='top-menu-item-color'>
          <p class='top-menu-text-item'><b>Listado</b></p>
        </a>
      </div>
      <div>
        <a href="{{ url('/calendar') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Calendario</p>
        </a>
      </div>
      <div>
        <a href="{{ url('/notificaciones') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Notificaciones</p>
        </a> 
      </div>   
    </nav>


    <!-- -->  
    <div class='body'>
    <h3   >Solicitar Combo</h3>
    <!-- --> 
    <div class='body-form'>
        <div class='body-form-combo'>
        
        <form action="#" method="post">
        {{method_field('PATCH')}}
            {{csrf_field()}}
            <div class="container">
              <div class="row">
              <table class="table "name="cantPersonas" style="text-align:center;">
                      <thead>
                          <tr>
                          <th>Combo</th>
                          <th>Productos</th>
                          <th>Cantidad pedidos</th>
                          <th>Cantidad máxima</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($combos as $combo)
                      <tr>
                        <td   >{{ $combo->nombre }}</td>
                        <td  >
                          <p>
                            <a data-toggle="collapse" href="#{{$combo->nombre}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Ver productos
                            </a>
                          </p>
                          <div class="collapse" id="{{$combo->nombre}}">
                            <div class="card card-body" style="width:300px;">
                              @foreach($combo->productos as $producto) 
                                {{$producto->producto}} - {{$producto->cantidad}}</p>
                              @endforeach
                            </div>
                          </div>
                        </td>
                        <td>  
                          <div class="form-group col-md-2">
                            <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cuatro" name="cuatro">
                          </div>
                        </td>
                        <td>{{ $combo->cantOrg }}</td>
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

    <!-- modal -->
    <div id="modalalerta" class="modalcss" style="display:none">

      <!-- Modal content -->
      <div class="modal-content">
        <!-- <span class="close">&times;</span> -->
        <div class="body-text-modal">
            Solicitud realizada con exito, a continuacion debe 
            seleccionar un turno
        </div>
        
        <button style="
position: relative;
top: 20%;
width: 70px;
left: 70%;
font-size: 15px" class="close-modal   btn-modal-style">Aceptar</button>
          
      </div>

    </div>


    <!-- modal -->
    <script>

      

      var button = document.getElementsByClassName("close-modal")[0];

     
      button.onclick = function() {
        var modalcss = document.getElementById("modalalerta");
        modalcss.style.display = "none";
      }

      
      window.onclick = function(event) {
        if (event.target == modalcss) {
          modalcss.style.display = "none";
        }
      }   


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
