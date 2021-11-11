<?php

namespace App\Jobs;

use App\Mail\PostToSubscribersMail;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscribersMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $post;
    public $website;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post,$website)
    {
        $this->post = $post;
        $this->website = $website;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = Subscriber::where('website_id', $this->website->id)->get();
        Mail::to($subscribers)->queue(new PostToSubscribersMail($this->post,$this->website));
    }
}
