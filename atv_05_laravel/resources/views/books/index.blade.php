@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Livros</h1>

    <a href="{{ route('books.create.select') }}" class="btn btn-success mb-3">
        Novo Livro (Select)
    </a>

    <a href="{{ route('books.create.id') }}" class="btn btn-secondary mb-3">
        Novo Livro (ID)
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->category->name }}</td>

                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection