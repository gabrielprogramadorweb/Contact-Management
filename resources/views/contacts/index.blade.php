@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact List</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
