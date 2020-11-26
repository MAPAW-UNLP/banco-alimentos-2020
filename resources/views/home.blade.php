@include('main')
@include('components.header')
@if(Auth::user()->estado==0)
    <div class="card" style=" margin: 70px 0px 60px; padding: 30px; align-items: center;">
        <div class="card-body">
            Su usuario no se encuentra habilitado. Comunicarse con el Banco aliementario.
        </div>
    </div>
@else
    @include('components.nav')
    @include('components.home-body')
    
@endif
@include('components.footer')
