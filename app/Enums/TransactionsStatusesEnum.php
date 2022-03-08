<?php

namespace App\Enums;

class TransactionsStatusesEnum
{
    public const authorised = [1, 100];

    public const decline = [2, 200];

    public const refunded = [3, 300];

    public const availableStatuses = [
        'authorised',
        'decline',
        'refunded',
    ];
}
