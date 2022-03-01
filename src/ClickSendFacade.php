<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codemonkey76\ClickSend\Skeleton\SkeletonClass
 */
class ClickSendFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'clicksend';
    }
}
