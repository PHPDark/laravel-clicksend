<?php

namespace Codemonkey76\ClickSend;

class ClickSendMessageResponse
{
    public string $message_id;
    public int $message_parts;
    public float $message_price;
    public string $status;
    public float $date;
    public string $to;
    public string $from;

    public function __construct($obj)
    {
        $this->message_id = data_get($obj, 'message_id', '');
        $this->message_parts = data_get($obj, 'message_parts', 0);
        $this->message_price = data_get($obj, 'message_price', 0);
        $this->status = data_get($obj, 'status', "NO STATUS");
        $this->date = data_get($obj, 'date', 0);
        $this->to = data_get($obj, 'to', '');
        $this->from = data_get($obj, 'from', '');
    }
}
