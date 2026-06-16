@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Editoras</h1>

    <a href="{{ route('publishers.create') }}" class="btn btn-success mb-3">
        Nova Editora
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->name }}</td>

                    <td>
                        <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection