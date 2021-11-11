<?php

namespace App\Http\Controllers;

use App\Services\WebsiteService;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return WebsiteService::getAllWebsites();
    }
}
