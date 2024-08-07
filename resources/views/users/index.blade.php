@extends('layouts.master')

@section('title', 'Users List')

@section('content')
    <h1>Users List</h1>
    
    <div class="form-group">
        <input type="text" id="search" class="form-control" placeholder="Search users by name...">
    </div>

    <div id="users-list" class="row">
        @foreach ($users as $user)
            <div class="col-md-2 mb-4 user">
                <div class="card">
                    <img src="{{ $user->Avatar }}" class="card-img-top" alt="Avatar">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->Nome }}</h5>
                        <p class="card-text">Posts: {{ $user->PostsUOL }}</p>
                        <p class="card-text">Cadastro: {{ $user->Cadastro }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                        $('#users-list').html('');
                        $.each(data, function(key, user) {
                            var userCard = '<div class="col-md-2 mb-4 user">' +
                                            '<div class="card">' +
                                                '<img src="' + user.Avatar + '" class="card-img-top" alt="Avatar">' +
                                                '<div class="card-body">' +
                                                    '<h5 class="card-title">' + user.Nome + '</h5>' +
                                                    '<p class="card-text">Posts: ' + user.PostsUOL + '</p>' +
                                                    '<p class="card-text">Cadastro: ' + user.Cadastro + '</p>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>';
                            $('#users-list').append(userCard);
                        });
                    }
                });
            });
        });
    </script>
@endsection
