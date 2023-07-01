<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Service\HelloService;
use App\Service\HelloServiceImpl;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testMake()
    {

        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("foo", $foo1->foo());
        self::assertEquals("foo", $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBinding()
    {
// gak seperti ini
//        $person = $this->app->make(Person::class);
        $this->app->bind(Person::class, function ($app) {
            return new Person("novin", "ardian");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals("novin", $person1->firstName);
        self::assertEquals("novin", $person2->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
// gak seperti ini
//      $person = $this->app->make(Person::class);
        $this->app->singleton(Person::class, function ($app) {
            return new Person("novin", "ardian");
        });

        $person1 = $this->app->make(Person::class);
//      bikin if not exist
        $person2 = $this->app->make(Person::class);
//      if exist, not create
        self::assertEquals("novin", $person1->firstName);
        self::assertEquals("novin", $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testInstance()
    {

        $person = new Person("novin", "ardian");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("novin", $person->firstName);
        self::assertEquals("novin", $person1->firstName);

        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }

    public function testDependency()
    {

        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
//
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);
        self::assertSame($bar, $bar1);
    }

    public function testHelloInterface()
    {
        $this->app->singleton(HelloService::class, HelloServiceImpl::class);

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Halo Novin", $helloService->hello("Novin"));
    }


}
