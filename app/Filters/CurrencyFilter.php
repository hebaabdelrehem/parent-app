<?php

namespace App\Filters;

use Illuminate\Support\Collection;

class CurrencyFilter implements FilterInterface
{
    public function apply(Collection $data, $value): Collection
    {
        return $data->where('currency', $value);
    }
}
