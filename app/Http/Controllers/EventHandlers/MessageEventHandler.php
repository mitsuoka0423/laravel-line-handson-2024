<?php

namespace App\Http\Controllers\EventHandlers;

use App\UseCases\BusinessCardListViewUseCase;
use App\UseCases\EchoUseCase;
use Illuminate\Support\Facades\Log;
use LINE\Webhook\Model\ImageMessageContent;
use LINE\Webhook\Model\MessageEvent;
use LINE\Webhook\Model\TextMessageContent;

class MessageEventHandler implements EventHandlerInterface {
    private MessageEvent $messageEvent;

    public function __construct(MessageEvent $messageEvent) {
        $this->messageEvent = $messageEvent;
    }

    /**
     * @return Message[]
     */
    public function handle(): array {
        Log::info(json_encode([__METHOD__, '[START]']));

        $messageContent = $this->messageEvent->getMessage();

        if ($messageContent instanceof TextMessageContent) {
            $text = $messageContent->getText();
            if ($text === '名刺一覧') {
                $usecase = new BusinessCardListViewUseCase();
            } else {
                $usecase = new EchoUseCase($messageContent->getText());
            }
        } elseif ($messageContent instanceof ImageMessageContent) {
            // $usecase = new BusinessCardResistrationUseCase($messageContent);
        };

        $messages = $usecase->execute();
        Log::debug(json_encode([__METHOD__, '$messages', $messages]));
        Log::info(json_encode([__METHOD__, '[END]']));

        return $messages;
    }
}
