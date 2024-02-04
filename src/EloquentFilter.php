<?php

namespace Darkjinnee\EloquentFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class EloquentFilter
 * @package Darkjinnee\EloquentFilter
 */
class EloquentFilter
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var Builder
     */
    protected Builder $query;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $query
     */
    public function apply(Builder $query): void
    {
        $this->query = $query;

        foreach ($this->request->all() as $key => $value) {
            $method = Str::camel($key);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
    }

}
