<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('chat')]
#[Description('Receive an AI response')]
class ChatCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Http::withToken(config('services.openai.key'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => 'What is Laravel?',
                    ],
                ],
            ],
        );
    }
}
