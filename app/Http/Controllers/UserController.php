<?php

namespace App\Http\Controllers;

use App\Services\SearchServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private SearchServiceInterface $search,
    ) {}

    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $fields = $request->validate([
            'query' => ['required', 'string', 'min:2'],
        ]);

        $users = $this->search->findUsersByName($fields['query']);

        return view('search', [
            'query' => $fields['query'],
            'users' => $users,
        ]);
    }
}
