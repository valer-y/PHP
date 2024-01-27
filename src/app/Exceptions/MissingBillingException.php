<?php

namespace App\Exception;

class MissingBillingException extends \Exception
{
    protected $message = 'Missing billing info';
}