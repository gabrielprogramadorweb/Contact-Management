@extends('layouts.app')

@section('title', 'Editar Contato')
@section('page-heading', 'Editar Contato')

@section('content')
    <style>
        .edit{
            width: 430px;
            position: relative;
            margin-top: 75px !important;
            left: 50%;
            transform: translateX(50%);
        }
    </style>
    <div class="container edit">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-auto">
                <h1 class="h3 text-primary">@yield('page-heading')</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
            </div>
        </div>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Editar Contato</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="p-3">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary">Nome</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control shadow-sm @error('name') is-invalid @enderror"
                            value="{{ old('name', $contact->name) }}"
                            required
                            placeholder="Digite o nome do contato">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label text-secondary">Contacto</label>
                        <input
                            type="text"
                            name="contact"
                            id="contact"
                            class="form-control shadow-sm @error('contact') is-invalid @enderror"
                            value="{{ old('contact', $contact->contact) }}"
                            required
                            placeholder="Digite o contacto">
                        @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control shadow-sm @error('email') is-invalid @enderror"
                            value="{{ old('email', $contact->email) }}"
                            required
                            placeholder="Digite o email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2 shadow">Salvar Alterações</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary shadow">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
