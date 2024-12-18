@extends('laravel-usp-theme::master')

@section('content')

@if(Auth::guest())
<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="card">
        <div class="card-header"><b>Registro para Editora/Gráfica</b></div>

        <div class="card-body">
            <!-- Descrição do formulário -->
            <div class="row">
                <div class="col-sm form-group">
                    <b>Para criar uma conta, insira o CNPJ da empresa, o e-mail de contato e a senha para a conta.</b>
                </div>
            </div>
            <br>

            <!-- CNPJ -->
            <div class="row">
                <div class="col-sm form-group">
                    <label class="col-sm required" for="cnpj">CNPJ: </label>
                    <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="{{ old('cnpj') }}">
                </div>
            </div>

            <!-- Email -->
            <div class="row">
                <div class="col-sm form-group">
                    <label class="col-sm required" for="email">Email do Representante da Empresa: </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-sm form-group">
                    <label class="col-sm required" for="password">Senha: </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="row">
                <div class="col-sm form-group">
                    <label class="col-sm required" for="password_confirmation">Confirmar Senha: </label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <!-- Esqueci a Senha (link) -->
            <a href="{{ route('loginempresa') }}">Esqueci a Senha</a>

        </div> <!-- Fim do card-body -->

        <!-- Botão de Submit -->
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
        </div>
    </div> <!-- Fim do card -->
</form>

@else
    @include('dashboard')
@endif

@endsection('content')