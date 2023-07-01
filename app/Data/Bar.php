<?php

namespace App\Data;

class Bar
{
    public Foo $foo;

    /**
     * @param Foo $foo
     */
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function bar()
    {
        return $this->foo->foo() . " and bar";
    }


}
