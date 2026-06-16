@extends('layouts.app')

@section('content')
<div class="container">

<h1>Livro (ID)</h1>

<form method="POST" action="{{ route('books.store.id') }}">
@csrf

<input class="form-control mb-2" name="title" placeholder="Título">
<input class="form-control mb-2" name="pages" placeholder="Páginas">

<input class="form-control mb-2" name="author_id" placeholder="ID Autor">
<input class="form-control mb-2" name="publisher_id" placeholder="ID Editora">
<input class="form-control mb-2" name="category_id" placeholder="ID Categoria">

<button class="btn btn-success">Salvar</button>

</form>

</div>
@endsection