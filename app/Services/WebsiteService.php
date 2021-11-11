<?php


namespace App\Services;


use App\Models\Website;

class WebsiteService
{
    public static function getAllWebsites()
    {
        $websites = Website::all();
        return response()->json($websites);
    }
}
