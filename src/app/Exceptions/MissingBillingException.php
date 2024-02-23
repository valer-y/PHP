<?php

namespace App\Exceptions;

class MissingBillingException extends \Exception
{
    protected $message = 'Missing billing info';
}