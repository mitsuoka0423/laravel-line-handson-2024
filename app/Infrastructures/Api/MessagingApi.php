<?php

namespace App\Infrastructures\Api;

use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Api\MessagingApiBlobApi;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use LINE\Clients\MessagingApi\Model\TextMessage;

class MessagingApi
{
  private MessagingApiApi $apiClient;
  private MessagingApiBlobApi $blobApiClient;

  public function __construct(string $channelAccessToken = '') {
    $client = new Client();
    $config = (new Configuration())->setAccessToken($channelAccessToken || config('line.channel_access_token'));

    $this->apiClient = new MessagingApiApi(client: $client, config: $config);
    $this->blobApiClient = new MessagingApiBlobApi(client: $client, config: $config);
  }

  public function reply(string $replyToken, string $message)
  {
    $messages = [(new TextMessage())->setText($message)];
    $request = (new ReplyMessageRequest())
      ->setReplyToken($replyToken)
      ->setMessages($messages);

    $this->apiClient->replyMessage($request);
  }

  public function getContent(string $messageId)
  {
    $content = $this->blobApiClient->getMessageContent($messageId);
  }
}
