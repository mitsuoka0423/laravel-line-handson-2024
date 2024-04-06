<?php

namespace App\Http\Controllers;

use App\UseCases\ImageMessageUseCase;
use App\UseCases\ImageMessageUseCaseRequest;
use Illuminate\Support\Facades\Log;
use LINE\Webhook\Model\MessageEvent;
use Symfony\Component\HttpFoundation\Request;

class LineController extends Controller
{
    public function post(Request $request)
    {
        Log::info(['LineController::post', '[START]']);
        // $events = $request->getEvents();
        // Log::debug(json_encode($events));

        // foreach ($events as $event) {
        //     if ($event instanceof MessageEvent) {
        //         $usecase = new ImageMessageUseCase();
        //         $usecaseRequest = new ImageMessageUseCaseRequest($event);
        //         $usecase->execute($usecaseRequest);
        //     }
        // }

        Log::info(['LineController::post', '[END]']);

        return response('ok');
    }
}
