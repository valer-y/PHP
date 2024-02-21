<?php

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function it_registers_a_route() : void
    {
        //give a router obj
        $router = new Router();

        //call register
        $router->register('get', '/users', ['Users', 'index']);

        $sxpected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];

        //assert
        $this->assertEquals($sxpected, $router->routes());
    }
}