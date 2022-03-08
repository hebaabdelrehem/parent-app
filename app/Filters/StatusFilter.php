<?php

namespace App\Filters;

use Illuminate\Support\Collection;
use App\Enums\TransactionsStatusesEnum;

class StatusFilter implements FilterInterface
{
    public function apply(Collection $data, $value): Collection
    {
        if (! in_array($value, TransactionsStatusesEnum::availableStatuses)) {
            return collect([]);
        }

        return $data->whereIn('status', constant("App\Enums\TransactionsStatusesEnum::${value}"));
    }
}
