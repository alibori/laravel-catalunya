<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\TelegramBot\SendWelcomeMessageToNewMembersAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Telegram\Bot\Exceptions\TelegramSDKException;

final class TelegramWebhookController extends Controller
{
    public function __construct(private SendWelcomeMessageToNewMembersAction $sendWelcomeMessageToNewMembersAction)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws TelegramSDKException
     */
    public function __invoke(Request $request): JsonResponse
    {
        return $this->sendWelcomeMessageToNewMembersAction->execute();
    }
}
