<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Fetch users with pagination (100 users per page), ordered by PostsUOL in descending order
        $users = DB::table('uol_users')
                    ->select('id', 'Nome', 'Avatar', 'PostsUOL', DB::raw('FROM_UNIXTIME(Cadastro / 1000, "%d/%m/%Y") as Cadastro'))
                    ->orderBy('PostsUOL', 'desc')
                    ->paginate(100);

        // Pass the users data to the view
        return view('users.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = DB::table('uol_users')
                    ->select('id', 'Nome', 'Avatar', 'PostsUOL', DB::raw('FROM_UNIXTIME(Cadastro / 1000, "%d/%m/%Y") as Cadastro'))
                    ->where('Nome', 'LIKE', "%$query%")
                    ->orderBy('PostsUOL', 'desc')
                    ->get();

        return response()->json($users);
    }
}
