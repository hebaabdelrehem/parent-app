<?php

namespace App\DataProviders;

class DataProviderX extends DataProviderAbstract
{
    protected $providerName = 'DataProviderX';

    protected $fileName = 'DataProviderX.json';

    protected $dataMapping = [
        'balance'  => 'parentAmount',
        'currency' => 'Currency',
        'email'    => 'parentEmail',
        'status'   => 'statusCode',
        'date'     => 'registerationDate',
        'parentId' => 'parentIdentification',
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
