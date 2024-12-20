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
                    <label for="cnpj" class="required">CNPJ:</label>
                    <input 
                        type="text" 
                        class="form-control cnpj {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" 
                        id="cnpj" 
                        name="cnpj" 
                        value="{{ old('cnpj') }}" 
                        required>
                    @if($errors->has('cnpj'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cnpj') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Email -->
            <div class="row">
                <div class="col-sm form-group">
                    <label for="email" class="required">Email do Representante da Empresa:</label>
                    <input 
                        type="email" 
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-sm form-group">
                    <label for="password" class="required">Senha:</label>
                    <input 
                        type="password" 
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                        id="password" 
                        name="password" 
                        required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="row">
                <div class="col-sm form-group">
                    <label for="password_confirmation" class="required">Confirmar Senha:</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required>
                </div>
            </div>

            <!-- Esqueci a Senha (link) -->
            <div class="row">
                <div class="col-sm text-end">
                    <a href="{{ route('loginempresa') }}">Esqueci a Senha</a>
                </div>
            </div>

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

@endsection
