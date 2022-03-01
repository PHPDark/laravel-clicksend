<?php

namespace Codemonkey76\LaravelClicksend;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codemonkey76\LaravelClicksend\Skeleton\SkeletonClass
 */
class LaravelClicksendFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-clicksend';
    }
}
