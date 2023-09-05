<?php

namespace App\Exception;

use \Exception;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found';
}