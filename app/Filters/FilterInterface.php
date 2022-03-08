<?php

namespace App\Filters;

use Illuminate\Support\Collection;

interface FilterInterface
{
    public function apply(Collection $data, $value): Collection;
}
