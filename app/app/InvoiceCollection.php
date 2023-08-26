<?php

namespace App;

use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;
use function example2\echo_chaining_;

class InvoiceCollection implements \IteratorAggregate
{
    public function __construct(public array $invoices)
    {
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->invoices);
    }

//    public function current(): mixed
//    {
//        echo __METHOD__ . PHP_EOL;
//        return current($this->invoices);
//    }
//
//    public function next(): void
//    {
//        echo __METHOD__ . PHP_EOL;
//
//        next($this->invoices);
//    }
//
//    public function key(): mixed
//    {
//        echo __METHOD__ . PHP_EOL;
//
//        return key($this->invoices);
//    }
//
//    public function valid(): bool
//    {
//        echo __METHOD__ . PHP_EOL;
//
//        return current($this->invoices) !== false;
//    }
//
//    public function rewind(): void
//    {
//        echo __METHOD__ . PHP_EOL;
//
//        reset($this->invoices);
//    }
}