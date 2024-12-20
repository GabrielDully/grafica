@extends('laravel-usp-theme::master')

@section('content')

@if(Auth::guest())
  <div class="card">

    <div class="card-header"><b>Sistema para solicitação de serviços da Editora e Gráfica</b></a></div>
    
    <div class="card-body">
      <div class="row">
        <div class="col-sm">
          <a href="{{ $app_url }}/login" class="btn btn-success"> 
            <i class="fa fa-university" aria-hidden="true"></i>
            Login USP 
          </a>
        </div>

        <div class="col-sm">
            <!-- Link para a página de registro -->
            <a href="{{ route('register') }}" class="btn btn-success">
                <i class="fa fa-building" aria-hidden="true"></i> Editora / Gráfica - Primeiro Acesso
            </a>

            <!-- Link para a página de login -->
            <a href="{{ route('loginempresa') }}" class="btn btn-success">
                <i class="fa fa-building" aria-hidden="true"></i> Login com Senha
            </a>
        </div>

      </div>

      <hr>

      <div class="row">
        <div class="col-sm">

          <iframe width="560" height="315" src="https://www.youtube.com/embed/8VSvUe_r4dA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
      </div>
    </div>
  </div>
  @else
    @include('dashboard')
@endif

@endsection('content')
