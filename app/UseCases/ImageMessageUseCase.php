<?php

namespace App\UseCases;

class ImageMessageUseCase
{
  public function execute(ImageMessageUseCaseRequest $request) {
    // Messaging API でコンテンツ（画像取得）
    // Storage::put
    // Claude API で OCR & 構造化
    // DB にいれる
    // Messaging API で読み取り結果をリプライ
  }
}
