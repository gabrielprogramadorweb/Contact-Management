@extends('layouts.app')

@section('content')
    <style>
        .create {
            position: relative;
            margin-top: 75px !important;
            left: 50%;
            transform: translateX(50%);
        }
    </style>
    <div class="container create">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-auto">
                <h1 class="h3 text-primary">Adicionar Novo Contato</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm shadow">Voltar à Lista</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Adicionar Contato</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.store') }}" method="POST" class="p-3">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary">Nome</label>
                        <input
                            type="text"
                            class="form-control shadow-sm @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Digite o nome do contato"
                            required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label text-secondary">Contacto</label>
                        <input
                            type="text"
                            class="form-control shadow-sm @error('contact') is-invalid @enderror"
                            id="contact"
                            name="contact"
                            value="{{ old('contact') }}"
                            placeholder="Digite o contacto"
                            required>
                        @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary">E-mail</label>
                        <input
                            type="email"
                            class="form-control shadow-sm @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Digite o e-mail"
                            required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary shadow me-2">Adicionar Contato</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary shadow">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
