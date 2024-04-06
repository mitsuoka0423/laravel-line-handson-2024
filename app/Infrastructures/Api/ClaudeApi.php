<?php

namespace App\Infrastructures\Api;

use Illuminate\Support\Facades\Http;

class ClaudeApi
{
  const string URL = 'https://api.anthropic.com/v1/messages';
  private string $apiKey;

  public function __construct(string $apiKey)
  {
    $this->apiKey = $apiKey;
  }

  public function messages(ClaudeApiRequest $request): ClaudeApiResponse
  {
    $requestBody = $request->getBody();

    $response = Http::withHeaders([
      'x-api-key' => $this->apiKey,
      'anthropic-version' => '2023-06-01',
      'content-type' => 'application/json'
    ])->post(self::URL, $requestBody);

    $body = json_decode($response->body(), true);

    return new ClaudeApiResponse($body);
  }
}
