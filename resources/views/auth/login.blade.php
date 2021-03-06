<link rel="stylesheet" href="{{ url('css/login.css') }}">

@include('main')
@include('components.header')
@include('components.nav')
<div class="general-container">
    <div class="left-container">
        <img src="{{ asset('img/slide2_2.jpg') }}" class='img-fluid'>
    </div>
    <div class='right-container'>
        <div class="card-body">
        <h3>Iniciar sesión</h3>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right" title="Email del usuario">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" title="Email del usuario" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right" title="Contraseña del usuario">Contraseña</label>
                    <div class="col-md-6">
                        <input id="password" type="password" title="Contraseña del usuario" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                 </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn " title="Aceptar" style="background-color: #103965; color:#ffffff">
                            Aceptar
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ url('/recover') }}" title="Recuperar contraseña">
                            Recuperar contraseña
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.footer')
