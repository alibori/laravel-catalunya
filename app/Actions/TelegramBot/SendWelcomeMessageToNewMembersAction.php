<?php

declare(strict_types=1);

namespace App\Actions\TelegramBot;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

final class SendWelcomeMessageToNewMembersAction
{
    private Api $telegram;

    /**
     * @throws TelegramSDKException
     */
    public function __construct()
    {
        $this->telegram = new Api(config('telegram.bots.mybot.token'));
    }

    /**
     * @return JsonResponse
     * @throws TelegramSDKException
     */
    public function execute(): JsonResponse
    {
        Log::channel('telegram')->info('Received Telegram webhook update.');

        $update = $this->telegram->getWebhookUpdate();

        if (isset($update['chat_member'])) {
            Log::channel('telegram')->info('Handling chat member update.');

            return $this->handleChatMember($update['chat_member']);
        }

        return response()->json('OK');
    }

    /**
     * @param array<array-key, mixed> $data
     * @return JsonResponse
     * @throws TelegramSDKException
     */
    private function handleChatMember(array $data): JsonResponse
    {
        $new = $data['new_chat_member'] ?? null;

        if ( ! $new) {
            return response()->json('OK');
        }

        $name = $new['user']['first_name'] ?? 'Usuari';

        $thread = config('telegram.bots.mybot.threads.welcome');

        $this->telegram->sendMessage([
            'chat_id'            => $data['chat']['id'],
            'message_thread_id'  => $thread,
            'text'               => "Benvingut/da, {$name}! 🎉",
        ]);

        return response()->json('OK');
    }
}
