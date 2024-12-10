@extends('layouts.base')

@section('title', 'Detalhes do Contato')
@section('page-heading', 'Detalhes do Contato')

@section('content')
    <style>
        .show{
            width: 430px;
            position: relative;
            margin-top: 75px !important;
            left: 50%;
            transform: translateX(50%);
        }
    </style>
    <div class="container show">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 text-primary">@yield('page-heading')</h1>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm shadow">Voltar</a>
        </div>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <h6 class="m-0 font-weight-bold">Informações do Contato</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>
                        <tr>
                            <th scope="row" class="text-secondary">ID</th>
                            <td>{{ $contact->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Nome</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Contacto</th>
                            <td>{{ $contact->contact }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm shadow-sm">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fa fa-trash"></i> Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Tem certeza de que deseja excluir este contato? Esta ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow-sm">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
