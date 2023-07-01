<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Service\HelloService;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testServiceProvider(): void
    {

        $foo = $this->app->make(Foo::class);
        $foo1 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo);

        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar);
        self::assertEquals($foo, $bar->foo);
        self::assertEquals($foo, $bar1->foo);
    }

    public function testPropsSingleton()
    {

        $helloService = $this->app->make(HelloService::class);
        $helloService1 = $this->app->make(HelloService::class);
        self::assertSame($helloService, $helloService1);
        self::assertEquals("Halo Novin", $helloService->hello("Novin"));

    }

    public function testName()
    {
        self::assertTrue(true);
    }


}
