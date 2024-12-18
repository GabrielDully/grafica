<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return  view('auth.register');
    }

    public function handle()
    {
        // Validação
        request()->validate([
            'cnpj' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Criação do usuário
        $user = User::create([
            'cnpj' => request('cnpj'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        // Disparar o evento de registro
        event(new Registered($user));

        // Logar o usuário
        Auth::login($user);

        // Redirecionar para a página inicial ou outra página
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
