@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Adicionar Livro (Select)</h1>

 <form action="{{ route('books.store.select') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- TÍTULO -->
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- PÁGINAS -->
    <div class="mb-3">
        <label>Páginas</label>
        <input type="number" name="pages" class="form-control" required>
    </div>

    <!-- EDITORA -->
    <div class="mb-3">
        <label>Editora</label>
        <select name="publisher_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- AUTOR -->
    <div class="mb-3">
        <label>Autor</label>
        <select name="author_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- CATEGORIA -->
    <div class="mb-3">
        <label>Categoria</label>
        <select name="category_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- CAPA DO LIVRO -->
    <div class="mb-3">
        <label>Capa do Livro (opcional)</label>
        <input type="file" name="cover_image" class="form-control" accept="image/*">
    </div>

    <!-- BOTÃO -->
    <button type="submit" class="btn btn-success">
        Salvar
    </button>

</form>

</div>
@endsection