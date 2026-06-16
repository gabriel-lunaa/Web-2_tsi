@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Detalhes da Categoria</h1>

    <div class="card">
        <div class="card-body">
            <h5>ID:</h5>
            <p>{{ $category->id }}</p>

            <h5>Nome:</h5>
            <p>{{ $category->name }}</p>
        </div>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">
        Voltar
    </a>

</div>
@endsection