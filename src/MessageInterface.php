<?php

namespace Codemonkey76\ClickSend;

interface MessageInterface {
    function sendMessage(SmsMessage|array $messages) : ClickSendResponse;
    function getMessageReceipt(string $message_id) : array;
}
