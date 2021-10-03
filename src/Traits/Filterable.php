<?php

namespace Darkjinnee\EloquentFilter\Traits;

use Darkjinnee\EloquentFilter\EloquentFilter;

/**
 * Trait Filterable
 * @package Darkjinnee\EloquentFilter\Traits
 */
trait Filterable
{
    /**
     * @param $query
     * @param EloquentFilter $eloquentFilter
     */
    public function scopeFilter($query, EloquentFilter $eloquentFilter)
    {
        $eloquentFilter->apply($query);
    }
}
