<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = $this->getUsers();
        return view('users.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page', 1);
        
        $users = $this->getUsers($query, $page);
        
        if ($request->ajax()) {
            return response()->json([
                'users' => $users->items(),
                'pagination' => (string) $users->links('pagination::bootstrap-4')
            ]);
        }
        
        return view('users.index', ['users' => $users]);
    }

    private function getUsers($query = null, $page = 1)
    {
        $perPage = 100;
        $usersQuery = DB::table('uol_users')
            ->select('Id', 'Nome', 'Avatar', 'PostsUOL', DB::raw('FROM_UNIXTIME(Cadastro / 1000, "%d/%m/%Y") as Cadastro'))
            ->orderBy('PostsUOL', 'desc');
            
        if (!empty($query)) {
            $usersQuery->where('Nome', 'LIKE', "%$query%");
        }
        
        return $usersQuery->paginate($perPage, ['*'], 'page', $page);
    }

    public function userThreads($id_user)
    {
        // Busca informações do usuário
        $user = DB::table('uol_users')
                    ->select('Id', 'Nome', 'Avatar', 'PostsUOL', DB::raw('FROM_UNIXTIME(Cadastro / 1000, "%d/%m/%Y") as Cadastro'))
                    ->where('id', $id_user)
                    ->first();

        if (!$user) {
            abort(404, 'User not found');
        }

        // Busca tópicos criados pelo usuário
        $threads = DB::table('uol_threads')
                    ->select('Id', 'Titulo', 'Posts')
                    ->where('AutorId', $id_user)
                    ->orderBy('Id', 'desc')
                    ->paginate(20);

        return view('users.threads', [
            'user' => $user,
            'threads' => $threads
        ]);
    }
}
