@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-4">Controle de Multas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <div class="alert alert-info">
            Nenhum usuário possui débitos.
        </div>
    @else

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Débito</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>R$ {{ number_format($user->debit,2,',','.') }}</td>

                        <td>

                            <form action="{{ route('fines.clear',$user) }}" method="POST">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-success btn-sm">
                                    Quitar Débito
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @endif

</div>
@endsection