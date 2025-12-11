@extends('layouts.master')

@section('title', 'Lista de Tópicos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Tópicos</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('threads.index', ['sort' => 'Id', 'direction' => $sortField === 'Id' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                            ID
                            @if($sortField === 'Id')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('threads.index', ['sort' => 'Titulo', 'direction' => $sortField === 'Titulo' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                            Título
                            @if($sortField === 'Titulo')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('threads.index', ['sort' => 'Autor', 'direction' => $sortField === 'Autor' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                            Autor
                            @if($sortField === 'Autor')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('threads.index', ['sort' => 'Posts', 'direction' => $sortField === 'Posts' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                            Posts
                            @if($sortField === 'Posts')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($threads as $thread)
                    <tr>
                        <td>{{ $thread->Id }}</td>
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

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $threads->links('pagination::bootstrap-4') }}
    </div>
@endsection
