@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Autores</h1>

    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">
        Novo Autor
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>

                    <td>
                        <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection