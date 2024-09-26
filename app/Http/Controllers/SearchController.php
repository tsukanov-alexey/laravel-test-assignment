<?php

namespace App\Http\Controllers;

use App\Services\SearchServiceInterface;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function __construct(
        private SearchServiceInterface $search,
    ) {}

    public function index()
    {
        return view('search');
    }

    public function search(SearchRequest $request)
    {
        $users = $this->search->findUsersByName($request['query']);

        return view('search', [
            'query' => $request['query'],
            'users' => $users,
        ]);
    }
}
