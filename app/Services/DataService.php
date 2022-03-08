<?php

namespace App\Services;

use App\Traits\Filterable;
use App\Filters\StatusFilter;
use App\Filters\CurrencyFilter;
use App\Filters\ProviderFilter;
use App\Filters\MaxBalanceFilter;
use App\Filters\MinBalanceFilter;
use App\DataProviders\DataProviderX;
use App\DataProviders\DataProviderY;

class DataService
{
    use Filterable;

    protected $data;

    private $availableDataProviders = [
        DataProviderX::class,
        DataProviderY::class,
    ];

    public function __construct()
    {
        $combinedData = collect();

        foreach ($this->availableDataProviders as $dataProvider) {
            $combinedData = $combinedData->concat((new $dataProvider())->getData());
        }

        $this->data = $combinedData->values();
    }

    public function get()
    {
        return $this->filterBy($this->filters());
    }

    private function filters(): array
    {
        return [
            'provider'   => ProviderFilter::class,
            'currency'   => CurrencyFilter::class,
            'balanceMin' => MinBalanceFilter::class,
            'balanceMax' => MaxBalanceFilter::class,
            'status'     => StatusFilter::class,
        ];
    }
}
