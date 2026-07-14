@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Detalhes do Usuário</h1>

    {{-- DADOS DO USUÁRIO --}}
    <div class="card">
        <div class="card-header">
            {{ $user->name }}
        </div>

        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>

    {{-- HISTÓRICO DE EMPRÉSTIMOS --}}
    <div class="card mt-4">
        <div class="card-header">Histórico de Empréstimos</div>

        <div class="card-body">
            @if($user->books->isEmpty())
                <p>Sem empréstimos.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Livro</th>
                            <th>Empréstimo</th>
                            <th>Devolução</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($user->books as $book)
                        <tr>
                            <td>
                                <a href="{{ route('books.show', $book->id) }}">
                                    {{ $book->title }}
                                </a>
                            </td>

                            <td>{{ $book->pivot->borrowed_at }}</td>
                            <td>{{ $book->pivot->returned_at ?? 'Em aberto' }}</td>

                            <td>
                                @if(is_null($book->pivot->returned_at))
                                    <form action="{{ route('borrowings.return', $book->pivot->id) }}" method="POST">
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