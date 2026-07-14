@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="my-4">Detalhes do Livro</h1>

    {{-- DADOS DO LIVRO --}}
 <div class="card mb-3">
    <div class="card-body">

        <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('images/default-cover.png') }}"
             width="120"
             class="mb-3">

        <p><strong>Título:</strong> {{ $book->title }}</p>
        <p><strong>Páginas:</strong> {{ $book->pages }}</p>
        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
        <p><strong>Categoria:</strong> {{ $book->category->name }}</p>

    </div>
</div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3 mb-4">
        Voltar
    </a>

    {{-- FORMULÁRIO DE EMPRÉSTIMO --}}
    <div class="card mb-4">
        <div class="card-header">Registrar Empréstimo</div>

        <div class="card-body">
            <form action="{{ route('books.borrow', $book) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Usuário</label>

                    <select class="form-select" name="user_id" required>
                        <option value="">Selecione um usuário</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Registrar Empréstimo</button>
            </form>
        </div>
    </div>

    {{-- HISTÓRICO DE EMPRÉSTIMOS --}}
    <div class="card">
        <div class="card-header">Histórico de Empréstimos</div>

        <div class="card-body">

            @if($book->users->isEmpty())
                <p>Nenhum empréstimo registrado.</p>
            @else

                <table class="table">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Data de Empréstimo</th>
                            <th>Data de Devolução</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($book->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->pivot->borrowed_at }}</td>
                                <td>{{ $user->pivot->returned_at ?? 'Em aberto' }}</td>

                                <td>
                                    @if(is_null($user->pivot->returned_at))
                                        <form action="{{ route('borrowings.return', $user->pivot->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button class="btn btn-warning btn-sm">
                                                Devolver
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            @endif

        </div>
    </div>

</div>
@endsection