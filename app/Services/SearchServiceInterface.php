<?php

namespace App\Services;

use App\Dtos\UserDto;

interface SearchServiceInterface
{
    /**
     * @param string $needle
     * @return array<UserDto>
     */
    public function findUsersByName(string $needle): array;
}