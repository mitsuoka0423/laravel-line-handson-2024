<?php

namespace App\UseCases;

use Illuminate\Support\Facades\Log;
use LINE\Clients\MessagingApi\Model\CarouselColumn;
use LINE\Clients\MessagingApi\Model\CarouselTemplate;
use LINE\Clients\MessagingApi\Model\MessageAction;
use LINE\Clients\MessagingApi\Model\TemplateMessage;
use LINE\Constants\ActionType;
use LINE\Constants\MessageType;
use LINE\Constants\TemplateType;

class BusinessCardListViewUseCase implements UseCaseInterface
{
    /**
     * @return Message[]
     */
    public function execute(): array
    {
        Log::info(json_encode([__METHOD__, '[START]']));

        // TODO: DBから名刺を取得

        $messages = [];
        $templateMessage = new TemplateMessage([
            'type' => MessageType::TEMPLATE,
            'altText' => '名刺一覧',
            'template' => new CarouselTemplate([
                'type' => TemplateType::CAROUSEL,
                'columns' => [
                    new CarouselColumn([
                        'title' => '加瀬薫',
                        'text' => 'マーチ株式会社',
                        'thumbnailImageUrl' => 'https://camo.qiitausercontent.com/bc1a2083e4a69698f52fe1cd71b4ccf4f77126cc/68747470733a2f2f71696974612d696d6167652d73746f72652e73332e61702d6e6f727468656173742d312e616d617a6f6e6177732e636f6d2f302f39303038372f32643166396631652d363064352d376337642d636530642d3134636434663162663130362e706e67',
                        'actions' => [
                            new MessageAction([
                                'type' => ActionType::MESSAGE,
                                'label' => '名刺を見る',
                                'text' => '名刺を見る:1',
                            ]),
                        ],
                    ]),
                    new CarouselColumn([
                        'title' => '佐々木里桜',
                        'text' => 'グリーンテラス薬局',
                        'thumbnailImageUrl' => 'https://camo.qiitausercontent.com/03489013be5f77149886844d410afcef65e9d79c/68747470733a2f2f71696974612d696d6167652d73746f72652e73332e61702d6e6f727468656173742d312e616d617a6f6e6177732e636f6d2f302f39303038372f35663932346436612d633566312d313633332d616135662d3239633962306231646635352e706e67',
                        'actions' => [
                            new MessageAction([
                                'type' => ActionType::MESSAGE,
                                'label' => '名刺を見る',
                                'text' => '名刺を見る:2',
                            ]),
                        ],
                    ]),
                    new CarouselColumn([
                        'title' => '堺大輔',
                        'text' => '堺グループ株式会社',
                        'thumbnailImageUrl' => 'https://camo.qiitausercontent.com/8bd1e2372530cdfd673cc33eb22d5b354934a9a7/68747470733a2f2f71696974612d696d6167652d73746f72652e73332e61702d6e6f727468656173742d312e616d617a6f6e6177732e636f6d2f302f39303038372f65393465623332322d323966642d613735372d626665662d6436393565316531633435622e706e67',
                        'actions' => [
                            new MessageAction([
                                'type' => ActionType::MESSAGE,
                                'label' => '名刺を見る',
                                'text' => '名刺を見る:3',
                            ]),
                        ],
                    ]),
                ],
            ]),
        ]);
        $messages[] = $templateMessage;

        Log::info(json_encode([__METHOD__, '[END]']));
        return $messages;
    }
}
