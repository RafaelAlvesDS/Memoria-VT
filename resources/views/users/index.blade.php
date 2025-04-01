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
                    <a href="{{ route('user.threads', $user->Id) }}" class="card-link" target="_blank">
                        <img src="{{ $user->Avatar }}" class="card-img-top" alt="Avatar">
                    </a>
                    
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
    <div id="pagination-links" class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            function debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this, args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        func.apply(context, args);
                    }, wait);
                };
            }

            function loadUsers(query = '', page = 1) {
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        'query': query,
                        'page': page
                    },
                    success: function(response) {
                        if (response.users.length > 0) {
                            var usersHtml = '';
                            $.each(response.users, function(key, user) {
                                usersHtml += '<div class="col-md-2 mb-4 user">' +
                                    '<div class="card">' +
                                        '<a href="/users/threads/'+user.Id+'" class="card-link" target="_blank">'+
                                            '<img src="' + user.Avatar + '" class="card-img-top" alt="Avatar">' +
                                        '</a>' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title">' + user.Nome + '</h5>' +
                                            '<p class="card-text">Posts: ' + user.PostsUOL + '</p>' +
                                            '<p class="card-text">Cadastro: ' + user.Cadastro + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                            });
                            $('#users-list').html(usersHtml);
                            $('#pagination-links').html(response.pagination);
                        } else {
                            $('#users-list').html('<div class="col-12"><p>No users found.</p></div>');
                            $('#pagination-links').html('');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        $('#users-list').html('<div class="col-12"><p>Error loading results.</p></div>');
                        $('#pagination-links').html('');
                    }
                });
            }

            // Handle search input
            $('#search').on('keyup', debounce(function() {
                var query = $(this).val().trim();
                loadUsers(query);
            }, 300));

            // Handle pagination clicks
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var query = $('#search').val().trim();
                loadUsers(query, page);
            });
        });
    </script>
@endsection
