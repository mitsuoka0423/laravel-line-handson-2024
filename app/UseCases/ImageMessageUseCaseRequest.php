<?php

namespace App\UseCases;

use LINE\Webhook\Model\MessageEvent;

class ImageMessageUseCaseRequest
{
  private string $messageId;

  public function __construct(MessageEvent $messageEvent) {
    $this->messageId = $messageEvent->getMessage()->getId();
  }

  public function getMessageId(): string
  {
    return $this->messageId;
  }
}
