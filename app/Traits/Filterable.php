<?php

namespace App\Traits;

use App\Filters\FilterInterface;

trait Filterable
{
    protected $data;

    public function filterBy(array $filters)
    {
        foreach ($filters as $filterKey => $filterClass) {
            $filterInstance = $this->resolve($filterClass);
            if ($filterInstance and request()->has($filterKey)) {
                $this->data = $filterInstance->apply($this->data, request($filterKey));
            }
        }

        return $this->data;
    }

    private function resolve($filterClass)
    {
        $filter = class_exists($filterClass) ? new $filterClass() : false;

        if (! $filter instanceof FilterInterface) {
            return false;
        }

        return $filter;
    }
}
