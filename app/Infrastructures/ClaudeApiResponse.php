<?php

namespace App\Infrastructures;

class ClaudeApiResponse
{
  private string $id;
  private string $type;
  private string $role;
  private Content $content;
  private string $model;
  private string $stopReason;
  private ?string $stopSequence;
  private Usage $usage;

  public function __construct(array $data)
  {
    $this->id = $data['id'];
    $this->type = $data['type'];
    $this->role = $data['role'];
    $this->content = new Content($data['content']);
    $this->model = $data['model'];
    $this->stopReason = $data['stop_reason'];
    $this->stopSequence = $data['stop_sequence'];
    $this->usage = new Usage($data['usage']);
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function getType(): string
  {
    return $this->type;
  }

  public function getRole(): string
  {
    return $this->role;
  }

  public function getContent(): Content
  {
    return $this->content;
  }

  public function getModel(): string
  {
    return $this->model;
  }

  public function getStopReason(): string
  {
    return $this->stopReason;
  }

  public function getStopSequence(): ?string
  {
    return $this->stopSequence;
  }

  public function getUsage(): Usage
  {
    return $this->usage;
  }
}

class Content
{
  private string $type;
  private string $text;

  public function __construct(array $content)
  {
    $this->type = $content[0]['type'];
    $this->text = $content[0]['text'];
  }

  public function getType(): string
  {
    return $this->type;
  }

  public function getText(): string
  {
    return $this->text;
  }
}

class Usage {
  private int $inputTokens;
  private int $outputTokens;

  public function __construct(array $usage) {
    $this->inputTokens = $usage['input_tokens'];
    $this->outputTokens = $usage['output_tokens'];
  }

  public function getinputTokens(): int {
    return $this->inputTokens;
  }

  public function getoutputTokens(): int {
    return $this->outputTokens;
  }
}
