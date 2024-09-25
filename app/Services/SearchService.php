<?php

namespace App\Services;

use App\Dtos\UserDto;
use Illuminate\Support\Facades\Http;

class SearchService implements SearchServiceInterface
{
    public function findUsersByName(string $needle): array
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();

        $users = collect($users)->filter(
            fn($user) => stripos($user['name'], $needle) !== false
        );
        
        return $users->map(fn($user) => new UserDto($user['name']))->toArray();
    }
}