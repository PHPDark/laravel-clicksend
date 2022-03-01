<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Support\Facades\Facade;
use Codemonkey76\ClickSend\MessageInterface;

class ClickSendFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MessageInterface::class;
    }
}
