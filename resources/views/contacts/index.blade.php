@extends('layouts.app')

@section('title', 'Lista de Contatos')
@section('page-heading', 'Lista de Contatos')

@section('content')
    <style>
        .index {
            margin-top: 75px !important;
            left: 50%;
            transform: translateX(50%);
        }
    </style>
    <div class="container index">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-auto">
                <h1 class="h3 text-primary">@yield('page-heading')</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm shadow">Adicionar Contato</a>
            </div>
        </div>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <h6 class="m-0 font-weight-bold">Lista de Contatos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Contato</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
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
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm shadow-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm shadow-sm">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-contact-id="{{ $contact->id }}">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Nenhum contato encontrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span>Mostrando {{ $contacts->firstItem() }} a {{ $contacts->lastItem() }} de {{ $contacts->total() }} contatos</span>
                    </div>
                    <div>
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Tem certeza de que deseja excluir este contato? Esta ação é irreversível.</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger shadow-sm">Excluir</button>
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
