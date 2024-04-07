<?php

namespace App\UseCases;

use Illuminate\Support\Facades\Log;
use LINE\Clients\MessagingApi\Model\TextMessage;
use LINE\Constants\MessageType;

class EchoUseCase implements UseCaseInterface
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return Message[]
     */
    public function execute(): array
    {
        Log::info(json_encode([__METHOD__, '[START]']));

        // NOTE: 送られたメッセージをそのまま返す（オウム返し）
        $messages = [];
        $textMessage = (new TextMessage())
            ->setText($this->text)
            ->setType(MessageType::TEXT);
        $messages[] = $textMessage;

        Log::info(json_encode([__METHOD__, '[END]']));
        return $messages;
    }
}
