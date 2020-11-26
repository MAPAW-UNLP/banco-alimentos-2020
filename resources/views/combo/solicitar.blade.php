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
    <div>
      <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item'>                          
          <p class='lateral-menu-text-item'>Mis solicitudes</p>              
      </a>
    </div>
    <div>
      <a href="{{ url('/registro') }}" class='lateral-menu-item'>         
          <p class='lateral-menu-text-item'>Modificar mis datos</p>
      </a>
    </div>
    <div>
      <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
        <p class='lateral-menu-text-item'>Gestion área social</p>
      </a>
    </div>
    <div>
      <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>                          
        <p class='lateral-menu-text-item'><b>Combos</b></p>              
      </a>
    </div>
    <div>
        <a href="{{ url('/') }}" class='lateral-menu-item'>
            <p class='lateral-menu-text-item'>Solicitar Combo</p>
        </a>
      </div>
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
    <h3 style="text-align:center">Solicitar Combo</h3>
    <!-- --> 
    <div class='body-form'>
        <div class='body-form-combo'>
        
        <form action="#" method="post">
        {{method_field('PATCH')}}
            {{csrf_field()}}
            <div class="container">
              <div class="row">
                  <table style="background-color: #F2994A; border-radius:10px" class="table table-borderless table-sm" id="tablaprueba">
                      <thead>
                          <tr>
                          <th>Combo</th>
                          <th>Productos</th>
                          <th>Cantidad pedidos</th>
                          <th>Cantidad máxima de combos</th>
                          <th></th>
                          <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($combos as $combo)
                      <tr>
                    
                        <td style="text-align:left;font-size:10px">{{ $combo->nombre }}</td>
                        <td style="text-align:center">
                        @foreach($combo->productos as $producto)
                          <p style="font-size:10px">{{$producto->producto}}</p>

                        @endforeach
                        
                        </td>
                        <td style="text-align:center">{{ $combo->cantOrg }}</td>
                        <td style="text-align:center">{{ $combo->stock }}</td>
                        <td style="text-align:center"><input type="checkbox" name="choose"></td>



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
