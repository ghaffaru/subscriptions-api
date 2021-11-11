<?php


namespace App\Services;


use App\Models\Subscriber;
use App\Models\Website;

class SubcriberService
{
    public function createNewSubscriber($request)
    {
        $website = Website::findOrFail($request->website_id);

        $subscriberExist = Subscriber::where([
            'email' => $request->email,
            'website_id' => $website->id
        ])->first();

        if ($subscriberExist) {
            return response()->json(['message' => 'This email is already subscribed to this website'], 400);
        }

        $subscriber = Subscriber::create([
            'email' => $request->email,
            'website_id' => $website->id
        ]);

        return response()->json(['message' => 'Subscriber created successfully!', 'subscriber' => $subscriber]);
    }
}
