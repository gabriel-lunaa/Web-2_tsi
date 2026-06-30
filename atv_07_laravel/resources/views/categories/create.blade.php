@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Adicionar Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Salvar</button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </form>

</div>
@endsection