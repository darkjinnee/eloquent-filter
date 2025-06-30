<?php

namespace Darkjinnee\EloquentFilter\Traits;

use Darkjinnee\EloquentFilter\EloquentFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait Filterable
 *
 * @method static filter(EloquentFilter $eloquentFilter)
 */
trait Filterable
{
    /**
     * @param  Builder  $query
     * @param  EloquentFilter  $eloquentFilter
     */
    public function scopeFilter(Builder        $query,
                                EloquentFilter $eloquentFilter): void
    {
        $eloquentFilter->apply($query);
    }
}
