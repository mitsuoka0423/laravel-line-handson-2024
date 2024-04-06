<?php

namespace App\Http\Requests;

use LINE\Parser\ParsedEvents;
use LINE\Webhook\Model\Event;
use Symfony\Component\HttpFoundation\Request;


class WebhookRequest extends Request
{
    /** @var Event[] */
    private array $events;

    public function __construct(ParsedEvents $parsedEvents)
    {
        $this->events = $parsedEvents->getEvents();
    }

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }
}
