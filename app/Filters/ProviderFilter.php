<?php

namespace App\Filters;

use Illuminate\Support\Collection;

class ProviderFilter implements FilterInterface
{
    public function apply(Collection $data, $value): Collection
    {
        return $data->where('provider', $value);
    }
}
