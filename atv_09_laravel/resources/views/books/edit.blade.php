@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Editar Livro</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- TÍTULO -->
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
        </div>

        <!-- PÁGINAS -->
        <div class="mb-3">
            <label>Páginas</label>
            <input type="number" name="pages" value="{{ $book->pages }}" class="form-control" required>
        </div>

        <!-- EDITORA -->
        <div class="mb-3">
            <label>Editora</label>
            <select name="publisher_id" class="form-control" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}"
                        {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- AUTOR -->
        <div class="mb-3">
            <label>Autor</label>
            <select name="author_id" class="form-control" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $author->id == $book->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- CATEGORIA -->
        <div class="mb-3">
            <label>Categoria</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- CAPA ATUAL -->
        @if($book->cover_image)
            <div class="mb-3">
                <label>Capa atual</label><br>
                <img src="{{ asset('storage/' . $book->cover_image) }}" width="120">
            </div>
        @endif

        <!-- NOVA CAPA -->
        <div class="mb-3">
            <label>Trocar capa (opcional)</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">
            Atualizar
        </button>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>
@endsection