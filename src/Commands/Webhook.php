<?php

namespace Paragraf\ViberBot\Commands;

use Illuminate\Console\Command;
use Paragraf\ViberBot\Http\Http;

class Webhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viber-bot:webhook {url : Webhook url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize your Webhook to some url';

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
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');

        if(Http::call('POST', 'set_webhook', [
            "url" => $url ? $url : route('viber-bot'),
            "event_types" => config('viberbot.event_types'),
            "send_name"=> true,
            "send_photo"=> true
        ])) {
            $this->error('Something went wrong!');
        };

        $this->info('You initialize successfully your route!');
    }
}
