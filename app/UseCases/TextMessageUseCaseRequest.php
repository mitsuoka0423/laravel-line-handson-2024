<?php

namespace App\UseCases;

use LINE\Webhook\Model\MessageEvent;
use LINE\Webhook\Model\TextMessageContent;

class TextMessageUseCaseRequest
{
  private string $replyToken;
  private TextMessageContent $messageText;

  public function __construct(MessageEvent $messageEvent) {
    $this->replyToken = $messageEvent->getReplyToken();
    $this->messageText = $messageEvent->getMessage();
  }

  public function getMessageText(): string
  {
    return $this->messageText->getText();
  }

  public function getReplyToken(): string
  {
    return $this->replyToken;
  }
}
