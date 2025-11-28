<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class TelegramWebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        Log::info('Telegram Webhook received:');
        Log::info(print_r($request->all(), true));

        $telegram = new Api(config('telegram.bots.mybot.token'));
        $update = $telegram->getWebhookUpdate();

        if (isset($update['chat_member'])) {
            return $this->handleChatMember($telegram, $update['chat_member']);
        }

        return response()->json('OK');
    }

    private function handleChatMember(Api $telegram, $data): JsonResponse
    {
        $new = $data['new_chat_member'] ?? null;

        if (!$new) {
            return response()->json('OK');
        }

        $name = $new['user']['first_name'] ?? 'Usuari';

        $thread = config('telegram.bots.mybot.threads.welcome');

        $telegram->sendMessage([
            'chat_id'            => $data['chat']['id'],
            'message_thread_id'  => $thread,
            'text'               => "Benvingut/da, $name! 🎉",
        ]);

        return response()->json('OK');
    }
}
