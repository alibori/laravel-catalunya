<?php

declare(strict_types=1);

namespace App\Actions\TelegramBot;

use App\Models\JobPosting;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

final readonly class SendJobPostingToChannelAction
{
    private Api $telegram;

    /**
     * @throws TelegramSDKException
     */
    public function __construct()
    {
        /** @var string $token */
        $token = config('telegram.bots.mybot.token');

        $this->telegram = new Api($token);
    }

    /**
     * @param JobPosting $jobPosting
     * @return bool
     * @throws TelegramSDKException
     */
    public function execute(JobPosting $jobPosting): bool
    {
        $this->handleJobPostingShoutOut([
            'title' => $jobPosting->title,
            'type' => $jobPosting->type->getLabel(),
            'work_mode' => $jobPosting->work_mode->getLabel(),
            'employment_hours' => $jobPosting->employment_hours->getLabel(),
            'description' => $jobPosting->description,
            'salary' => $jobPosting->salary,
            'application_url' => $jobPosting->application_url ?? '',
            'status' => $jobPosting->status->getLabel(),
        ]);

        return $jobPosting->update([
            'telegram_sync' => true
        ]);
    }

    /**
     * @param array<array-key, mixed> $data
     * @return void
     * @throws TelegramSDKException
     */
    private function handleJobPostingShoutOut(array $data): void
    {
        $chat = config('telegram.bots.mybot.channel_chat_id');
        $thread = config('telegram.bots.mybot.threads.jobs');

        $this->telegram->sendMessage([
            'chat_id'            => $chat,
            'message_thread_id'  => $thread,
            'text'               => $data['title'].PHP_EOL.PHP_EOL
                .$data['type'].PHP_EOL
                .$data['work_mode'].PHP_EOL
                .$data['employment_hours'].PHP_EOL.PHP_EOL
                .$data['description'].PHP_EOL.PHP_EOL
                .$data['salary'].PHP_EOL.PHP_EOL
                .$data['application_url'].PHP_EOL.PHP_EOL
                .$data['status'].PHP_EOL,
        ]);
    }
}
