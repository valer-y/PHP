<?php

namespace App\Exception;

class MissingValueException extends \Exception
{
    protected $message = 'Missing billing information';

}