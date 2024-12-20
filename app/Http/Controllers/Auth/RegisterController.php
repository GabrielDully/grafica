<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UsuarioEmpresa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Exibir o formulário de registro.
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Manipular o registro de novos usuários.
     */
    public function handle()
    {
        // Validação dos dados da requisição
        request()->validate([
            'cnpj' => ['required', 'string', 'max:255', 'unique:usuario_empresa,cnpj'],
            'email' => ['required', 'email', 'max:255', 'unique:usuario_empresa,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Criação do registro na tabela usuario_empresa
        $usuario = UsuarioEmpresa::create([
            'cnpj' => request('cnpj'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        // Disparar o evento de registro para funcionalidades adicionais (e.g., envio de e-mail)
        event(new Registered($usuario));

        // Logar o usuário automaticamente após o registro
        Auth::login($usuario);

        // Redirecionar para a página inicial ou dashboard
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
