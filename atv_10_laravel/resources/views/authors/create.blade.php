@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Novo Autor</h1>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Data de nascimento</label>
            <input type="date" name="birth_date" class="form-control">
        </div>

        <button class="btn btn-success">Salvar</button>
    </form>

</div>
@endsection