@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Editar Livro</h1>

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label>Páginas</label>
            <input type="number" name="pages" class="form-control" value="{{ $book->pages }}" required>
        </div>

        <div class="mb-3">
            <label>Editora</label>
            <select name="publisher_id" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}"
                        {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Autor</label>
            <select name="author_id" class="form-control">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $author->id == $book->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar</a>

    </form>

</div>
@endsection