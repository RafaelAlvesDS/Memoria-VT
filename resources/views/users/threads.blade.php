@extends('layouts.master')

@section('title', 'Threads by ' . $user->Nome)

@section('content')
    <div class="user-profile mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ $user->Avatar }}" class="img-fluid rounded-circle" alt="Avatar">
                    </div>
                    <div class="col-md-10">
                        <h2>{{ $user->Nome }}</h2>
                        <p><strong>Posts:</strong> {{ $user->PostsUOL }}</p>
                        <p><strong>Member since:</strong> {{ $user->Cadastro }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>Threads created</h3>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Posts</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($threads as $thread)
                    @php
                        // Remove acentos e caracteres especiais
                        $cleanTitle = iconv('UTF-8', 'ASCII//TRANSLIT', $thread->Titulo);
                        // Remove caracteres não alfanuméricos exceto espaços
                        $cleanTitle = preg_replace('/[^a-zA-Z0-9 ]/', '', $cleanTitle);
                        // Substitui espaços por hífens e converte para minúsculas
                        $cleanTitle = str_replace(' ', '-', strtolower(trim($cleanTitle)));
                        // Remove hífens múltiplos
                        $cleanTitle = preg_replace('/-+/', '-', $cleanTitle);
                    @endphp
                    <tr>
                        <td>{{ $thread->Id }}</td>
                        <td>
                            <a href="https://web.archive.org/web/http://forum.jogos.uol.com.br/{{ $cleanTitle }}_t_{{ $thread->Id }}" target="_blank">
                                {{ $thread->Titulo }}
                            </a>
                        </td>
                        <td>{{ $thread->Posts }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No threads found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $threads->links('pagination::bootstrap-4') }}
    </div>
@endsection