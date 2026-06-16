@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Detalhes da Editora</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $publisher->name }}</p>
        </div>
    </div>

    <a href="{{ route('publishers.index') }}" class="btn btn-secondary mt-3">
        Voltar
    </a>

</div>
@endsection