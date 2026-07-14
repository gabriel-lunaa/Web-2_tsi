@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editar Editora</h1>

    <form action="{{ route('publishers.update', $publisher) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" value="{{ $publisher->name }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>

</div>
@endsection