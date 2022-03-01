<?php

namespace Codemonkey76\ClickSend;

use Codemonkey76\ClickSend\ClickSendMessageResponse;

class ClickSendResponseData
{
    public float $total_price;
    public int $total_count;
    public int $queued_count;
    public array $messages;

    public function __construct($obj)
    {
        $this->total_price = data_get($obj, 'total_price', 0);
        $this->total_count = data_get($obj, 'total_count', 0);
        $this->queued_count = data_get($obj, 'queued_count', 0);
        $this->messages = collect(data_get($obj, 'messages'))
            ->map(fn($msg) => new ClickSendMessageResponse($msg))->toArray();
    }
}
