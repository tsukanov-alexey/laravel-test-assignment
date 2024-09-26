<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;

class ProfileController extends Controller
{
    public function store(StoreProfileRequest $request)
    {
        return new ProfileResource(Profile::create($request->all()));
    }
}
