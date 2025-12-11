<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query)) {
            return redirect()->back();
        }

        // Search Users
        $users = DB::table('uol_users')
            ->select('Id', 'Nome', 'Avatar', 'PostsUOL', DB::raw('FROM_UNIXTIME(Cadastro / 1000, "%d/%m/%Y") as Cadastro'))
            ->where('Nome', 'LIKE', "%{$query}%")
            ->orderBy('PostsUOL', 'desc')
            ->limit(20)
            ->get();

        // Search Threads
        $threads = DB::table('uol_threads')
            ->join('uol_users', 'uol_threads.AutorId', '=', 'uol_users.Id')
            ->select(
                'uol_threads.Id',
                'uol_threads.Titulo',
                'uol_threads.Posts',
                'uol_users.Nome as Autor',
                'uol_users.Id as AutorId'
            )
            ->where('uol_threads.Titulo', 'LIKE', "%{$query}%")
            ->orderBy('uol_threads.Posts', 'desc')
            ->limit(50)
            ->get();

        return view('search.results', [
            'query' => $query,
            'users' => $users,
            'threads' => $threads
        ]);
    }
}
