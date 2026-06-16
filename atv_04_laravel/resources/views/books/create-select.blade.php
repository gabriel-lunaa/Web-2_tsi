@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Adicionar Livro (Select)</h1>

    <form method="POST" action="{{ route('books.store.select') }}">
        @csrf

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Páginas</label>
            <input type="number" name="pages" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Editora</label>
            <select name="publisher_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Autor</label>
            <select name="author_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="category_id" class="form-control" required>
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Salvar</button>

    </form>

</div>
@endsection