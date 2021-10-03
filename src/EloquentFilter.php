<?php

namespace Darkjinnee\EloquentFilter;

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
    protected $request;
    /**
     * @var
     */
    protected $query;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $query
     */
    public function apply($query)
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
