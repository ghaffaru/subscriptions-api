<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscribersMailJob;
use App\Mail\PostToSubscribersMail;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TriggerEmailToSubscribers extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:subscribers {--post_id=} {--website_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to email a post to subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::findOrFail($this->option('post_id'));
        $website = Website::findOrFail($this->option('website_id'));
        if (!$post->sent) {
            dispatch_now(new SendSubscribersMailJob($post,$website));
            $post->update(['sent' => true]);
        }
    }
}
