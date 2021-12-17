<?php

namespace Atak011\VaoCore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Atak011\VaoCore\VaoCore
 */
class VaoCore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vao-core';
    }
}
