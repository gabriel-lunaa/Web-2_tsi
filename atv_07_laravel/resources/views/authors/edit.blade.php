@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editar Autor</h1>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" value="{{ $author->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $author->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Data de nascimento</label>
            <input type="date" name="birth_date" value="{{ $author->birth_date }}" class="form-control">
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>

</div>
@endsection