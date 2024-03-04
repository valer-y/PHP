<?php

namespace App\Exceptions\Container;

use PHPUnit\Framework\Exception;
use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}