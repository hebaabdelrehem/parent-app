<?php

namespace App\DataProviders;

use Illuminate\Support\Facades\Storage;

abstract class DataProviderAbstract
{
    abstract public function getDataMapping(): array;

    abstract public function getFileName(): string;

    abstract public function getProviderName(): string;

    public function getData()
    {
        $data = Storage::disk('local')->get('public/data/' . $this->getFileName());

        return collect(json_decode($data, true))->map(
            function ($dataItem) {
                $item['provider'] = $this->getProviderName();
                foreach ($this->getDataMapping() as $newKey => $oldKey) {
                    $item[$newKey] = $dataItem[$oldKey];
                }

                return $item;
            }
        );
    }
}
