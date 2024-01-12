<?php

namespace App\Enums;

class Status
{
    public const PAID     = 'paid';
    public const PENDING  = 'pending';
    public const DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::DECLINED => 'Declined',
        self::PAID     => 'Paid',
        self::PENDING  => 'Pending',
    ];
}