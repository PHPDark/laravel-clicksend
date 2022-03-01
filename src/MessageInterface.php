<?php

namespace Codemonkey76\ClickSend;

interface ClickSendMessageInterface {
    sendMessage(SmsMessage|array $messages) : ClickSendResponse;
    getMessageReceipt(ClickSendMessageResponse $messageResponse) : array;
}
