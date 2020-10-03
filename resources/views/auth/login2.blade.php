@include('main')
@include('components.header')
@include('components.nav')

<style>
/* Este es para los elementos en general */
.navbar-light .navbar-nav .nav-link {
color: white;
}
.navbar-light .navbar-brand {
color: white;
}
</style>


<div class="container-fluid">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
     		
      </div>
    </div>

    
    <div class="row p-2">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      
      </div>
    </div>


    <!-- Or let Bootstrap automatically handle the layout -->
    <div class="row mx-auto p-3">
    <!-- DIV 1 -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/slide2_2.jpg') }}" width=100% height=81%>
      </div>
    <!-- DIV 2 -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card text-white mb-2" style="background-color: #FB4A1B;">
                <div class="card-body">
                    <h5 class="card-title" aling="center">Iniciar sesión</h5>
                    <form>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                            </div>

                            <div class="row mx-auto p-4">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <a href="#">Recuperar contraseña</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <button type="submit" class="btn btn-primary" aling="center">Aceptar</button>
                                </div>
                            </div>                            
                    </form>
                    <div>
                        <p>¿Usted no esta registrado?</p>
                        <button type="submit" class="btn btn-primary">Registrarme</button>
                    </div>
                </div>
            </div>
      </div>
    </div>
    
</div>

   
</body>
</html>