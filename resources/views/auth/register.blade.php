@extends('layouts.app')

@section('title', 'Registrar-se')

@section('content')
    <style>
        .container{
            position: relative;
            left: 36%;
            transform: translateX(50%);
        }
    </style>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 450px;">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="m-0">Registrar-se</h5>
            </div>
            <div class="card-body">
                <!-- Exibe mensagens de sessão -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulário de Registro -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                            autofocus>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required>
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

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <span class="text-muted">Já possui uma conta?</span>
                <a href="{{ route('login') }}" class="text-primary text-decoration-none">Entrar</a>
            </div>
        </div>
    </div>
@endsection
