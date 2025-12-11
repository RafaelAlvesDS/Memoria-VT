<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'Posts'); // Default sort by Posts
        $sortDirection = $request->input('direction', 'desc'); // Default direction desc
        $perPage = 100;

        // Validate sort field to prevent SQL injection
        $allowedSorts = ['Id', 'Titulo', 'Posts', 'Autor'];
        if (!in_array($sortField, $allowedSorts)) {
            $sortField = 'Posts';
        }

        // Validate direction
        $sortDirection = strtolower($sortDirection) === 'asc' ? 'asc' : 'desc';

        $query = DB::table('uol_threads')
            ->join('uol_users', 'uol_threads.AutorId', '=', 'uol_users.Id')
            ->select(
                'uol_threads.Id',
                'uol_threads.Titulo',
                'uol_threads.Posts',
                'uol_users.Nome as Autor',
                'uol_users.Id as AutorId'
            );

        // Handle sorting
        if ($sortField === 'Autor') {
            $query->orderBy('uol_users.Nome', $sortDirection);
        } else {
            $query->orderBy('uol_threads.' . $sortField, $sortDirection);
        }

        $threads = $query->paginate($perPage)->withQueryString();

        return view('threads.index', [
            'threads' => $threads,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }
}
