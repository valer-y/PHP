<?php

namespace Tests\DataProviders;

class RouterDataProvider
{
    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/invoices', 'get'],
            ['/invoices', 'post'],
        ];
    }
}