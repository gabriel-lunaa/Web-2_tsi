@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Editar Categoria</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $category->name }}"
                   required>
        </div>

        <button class="btn btn-primary">Atualizar</button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </form>

</div>
@endsection