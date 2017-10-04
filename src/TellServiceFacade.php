<?php

namespace BlackBits\TellService;

use Illuminate\Support\Facades\Facade;


class TellServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TellService';
    }
}