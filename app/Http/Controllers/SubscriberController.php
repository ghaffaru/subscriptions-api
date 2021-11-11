<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Services\SubscriberService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(StoreSubscriberRequest $request)
    {
        return SubscriberService::createNewSubscriber($request);
    }
}
