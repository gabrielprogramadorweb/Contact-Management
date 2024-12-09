@extends('layouts.app')

@section('title', 'Lista de Contatos')
@section('page-heading', 'Lista de Contatos')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-auto">
                <h1 class="h3 text-gray-800">@yield('page-heading')</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">Novo Contato</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contatos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-contact-id="{{ $contact->id }}">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum contato encontrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este contato? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para Gerenciar o Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const contactId = button.getAttribute('data-contact-id');
                const actionUrl = `{{ url('contacts') }}/${contactId}`;
                deleteForm.action = actionUrl;
            });
        });
    </script>
@endsection
