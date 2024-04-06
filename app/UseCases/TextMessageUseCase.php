<?php

namespace App\UseCases;

use App\Infrastructures\Api\MessagingApi;

class TextMessageUseCase
{
  private MessagingApi $messagingApi;

  public function __construct() {
    $this->messagingApi = new MessagingApi(config('line.channel_access_token'));
  }

  public function execute(TextMessageUseCaseRequest $request) {
    $this->messagingApi->reply($request->getReplyToken(), $request->getMessageText());
  }
}
