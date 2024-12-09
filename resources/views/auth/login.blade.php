@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        .container{
            position: relative;
            left: 50%;
            transform: translateX(50%);
        }
    </style>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 400px;">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="m-0">Login</h5>
            </div>
            <div class="card-body">
                <!-- Exibe mensagens de sessão -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulário de Login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autofocus>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">Lembrar-me</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
{{--                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">--}}
{{--                                Esqueceu sua senha?--}}
{{--                            </a>--}}
                        @endif
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span class="text-muted">Ainda não tem uma conta?</span>
                <a href="{{ route('register') }}" class="text-primary text-decoration-none">Registrar-se</a>
            </div>
        </div>
    </div>
@endsection
