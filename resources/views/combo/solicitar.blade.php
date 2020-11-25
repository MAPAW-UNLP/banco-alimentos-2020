<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
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
      <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
        <p class='lateral-menu-text-item'>Cambiar contraseña</p>
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
            <input type="button" class='accept-combo'  onclick="run()" value="Aceptar"> 
            <input type='button' class='cancel-combo' onclick="window.location='{{ url("combos") }}'" value="Cancelar" style="color:white; border-color:#dc3545;">
                                            
          </div>          
        </form>
      </div>
    </div>


    

    <!-- modal -->
    <script>
      function run(){
        alert("Hizo click");

        



      }
    </script>

    <!-- --> 
      <!-- <h1>Modal</h1>

  <div class="overlay"></div>

  <div class="modal">
    <h2>Modal</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <button class="close">Close</button>    
  </div>
  <button class="open">Open</button>     -->



  </div>
</div>
@include('components.footer')
