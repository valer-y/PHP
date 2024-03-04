<?php

namespace App\Exceptions\Container;

use PHPUnit\Framework\Exception;
use Psr\Container\ContainerExceptionInterface;

class ContainerException extends Exception implements ContainerExceptionInterface
{

}