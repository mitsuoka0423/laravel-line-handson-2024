<?php

namespace App\Infrastructures;

use Illuminate\Support\Facades\Storage;

class ClaudeApiRequest
{
  private $model;
  private $maxTokens;
  private $prompt;
  private $imageType;
  private $imagePath;

  public function __construct(string $model, int $maxTokens, string $prompt, string $imageType, string $imagePath)
  {
    $this->model = $model;
    $this->maxTokens = $maxTokens;
    $this->prompt = $prompt;
    $this->imageType = $imageType;
    $this->imagePath = $imagePath;
  }

  public function getBody(): array
  {
    return [
      "model" => $this->model,
      "max_tokens" => $this->maxTokens,
      "messages" => [
        [
          "role" => "user",
          "content" => [
            [
              "type" => "image",
              "source" => [
                "type" => "base64",
                "media_type" => $this->imageType,
                "data" => $this->encodeBase64($this->imagePath),
              ],
            ],
            [
              "type" => "text",
              "text" => $this->prompt,
            ]
          ]
        ]
      ]
    ];
  }

  private function encodeBase64(string $imagePath): string
  {
    $binaryData = Storage::get($imagePath);
    return base64_encode($binaryData);
  }
}
