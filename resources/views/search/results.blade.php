@extends('layouts.master')

@section('title', 'Resultados da Busca: ' . $query)

@section('content')
    <div class="mb-4">
        <h1>Resultados para: "{{ $query }}"</h1>
    </div>

    <div class="row">
        <!-- Users Results -->
        <div class="col-md-12 mb-5">
            <h3>Usuários ({{ count($users) }})</h3>
            @if(count($users) > 0)
                <div class="row">
                    @foreach ($users as $user)
                        <div class="col-md-2 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('user.threads', $user->Id) }}" class="card-link text-decoration-none">
                                    <img src="{{ $user->Avatar }}" class="card-img-top" alt="{{ $user->Nome }}" style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate" title="{{ $user->Nome }}">{{ $user->Nome }}</h6>
                                        <small class="text-muted d-block">Posts: {{ $user->PostsUOL }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">Nenhum usuário encontrado.</div>
            @endif
        </div>

        <!-- Threads Results -->
        <div class="col-md-12">
            <h3>Tópicos ({{ count($threads) }})</h3>
            @if(count($threads) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Posts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($threads as $thread)
                                <tr>
                                    <td>
                                        <a href="https://web.archive.org/web/20180101000000/http://forum.jogos.uol.com.br/viewtopic.php?t={{ $thread->Id }}" target="_blank">
                                            {{ $thread->Titulo }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.threads', $thread->AutorId) }}">
                                            {{ $thread->Autor }}
                                        </a>
                                    </td>
                                    <td>{{ $thread->Posts }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">Nenhum tópico encontrado.</div>
            @endif
        </div>
    </div>
@endsection
