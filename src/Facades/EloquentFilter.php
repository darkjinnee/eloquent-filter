<?php

namespace Darkjinnee\EloquentFilter\Facades;

use Illuminate\Support\Facades\Facade;

class EloquentFilter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'eloquent-filter';
    }
}
