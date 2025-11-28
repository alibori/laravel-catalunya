<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\TelegramBot\SendWelcomeMessageToNewMembersAction;
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
