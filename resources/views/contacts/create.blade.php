@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Adicionar Novo Contacto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="contact">Contacto:</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact') }}" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Adicionar Contacto</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary mt-3">Voltar à Lista</a>
        </form>
    </div>
@endsection
