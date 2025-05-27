<?php

namespace App\Jobs;

use App\Data\InboundEmail;
use App\Models\Post;
use Blaspsoft\Blasp\Facades\Blasp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mews\Purifier\Facades\Purifier;

class ProcessInboundEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public InboundEmail $inboundEmail
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('Processing inbound email ID :: '. $this->inboundEmail->messageId);

        if($this->inboundEmail->isSpam())
        {
            info('Inbound email ID :: '. $this->inboundEmail->messageId . ' is marked as spam.');
            return;
        }

        // remove profanity from body
        $content = Blasp::check($this->inboundEmail->htmlBody)->getCleanString();

        // sanitize html
        $content = Purifier::clean($content);

        //save to database
        $post = Post::create([
            'content' => $content
        ]);

        info('Inbound email ID :: '. $this->inboundEmail->messageId . ' processed successfully. Post ID :: '. $post->id);
    }
}
