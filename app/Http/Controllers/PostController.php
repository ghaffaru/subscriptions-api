<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        return PostService::createNewPost($request);
    }
}
