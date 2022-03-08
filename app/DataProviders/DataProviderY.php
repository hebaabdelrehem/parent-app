<?php

namespace App\DataProviders;

class DataProviderY extends DataProviderAbstract
{
    protected $providerName = 'DataProviderY';

    protected $fileName = 'DataProviderY.json';

    protected $dataMapping = [
        'balance'  => 'balance',
        'currency' => 'currency',
        'email'    => 'email',
        'status'   => 'status',
        'date'     => 'created_at',
        'parentId' => 'id',
    ];

    public function getDataMapping(): array
    {
        return $this->dataMapping;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }
}
