<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $fields = $request->validate([
            'query' => ['required', 'string', 'min:2'],
        ]);

        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();

        $users = collect($users)->filter(
            fn($user) => stripos($user['name'], $fields['query']) !== false
        );

        return view('search', [
            'query' => $fields['query'],
            'users' => $users,
        ]);
    }
}
