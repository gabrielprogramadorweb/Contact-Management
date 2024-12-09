<?php
@extends('layouts.app')

@section('content')
    <div>
        <h1>Lista de Contatos</h1>
        <a href="{{ route('contacts.create') }}">Adicionar Novo Contato</a>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">Detalhes</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
