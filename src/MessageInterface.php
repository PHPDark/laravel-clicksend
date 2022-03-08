<?php

namespace Codemonkey76\ClickSend;

interface MessageInterface {
    function sendMessage(SmsMessage|array $messages) : ClickSendResponse;
    function getMessageReceipt($message_id) : array;
}
