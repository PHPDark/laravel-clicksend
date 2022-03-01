<?php

namespace Codemonkey76\ClickSend;

class SmsMessage
{
    public string $body;
    public string $to;
    public string $from;

    public function __construct(string $to, string $from, string $body)
    {
        $this->to = $to;
        $this->from = $from;
        $this->body = $body;
    }
}
