<?php

namespace App\Http\Middleware;

use App\Http\Requests\WebhookRequest;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LINE\Constants\HTTPHeader;
use LINE\Parser\EventRequestParser;
use Symfony\Component\HttpFoundation\Response;

class LineSignatureIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $requestBody = $request->getContent();
            Log::debug(['requestBody', json_encode($requestBody)]);

            $channelSecret = config('line.channel_secret');
            Log::debug(['channelSecret', $channelSecret]);

            $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
            Log::debug(['signature', $signature]);

            $parsedEvents = EventRequestParser::parseEventRequest($requestBody, $channelSecret, $signature);

            $webhookRequest = new WebhookRequest($parsedEvents);
        } catch (Exception $e) {
            Log::warning($e);

            // 署名検証に失敗した場合、 Bad Request
            return response()->json([Response::$statusTexts[Response::HTTP_BAD_REQUEST]], Response::HTTP_BAD_REQUEST);
        }

        return $next($webhookRequest);
    }
}
