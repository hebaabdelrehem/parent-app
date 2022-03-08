<?php

namespace App\Filters;

use Illuminate\Support\Collection;

class MaxBalanceFilter implements FilterInterface
{
    public function apply(Collection $data, $value): Collection
    {
        return $data->where('balance', '<=', $value);
    }
}
