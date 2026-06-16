@extends('layouts.app')

@section('content')
<div class="container">

<h1>Livro (ID)</h1>

<form action="{{ route('books.store.id') }}" method="POST" enctype="multipart/form-data">
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
        <label>ID Editora</label>
        <input type="number" name="publisher_id" class="form-control" required>
    </div>

    <!-- AUTOR -->
    <div class="mb-3">
        <label>ID Autor</label>
        <input type="number" name="author_id" class="form-control" required>
    </div>

    <!-- CATEGORIA -->
    <div class="mb-3">
        <label>ID Categoria</label>
        <input type="number" name="category_id" class="form-control" required>
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