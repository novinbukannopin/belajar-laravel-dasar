<?php

namespace App\Service;

class HelloServiceImpl implements HelloService
{
    public function hello(string $name): string
    {
        return "Halo $name";
    }


}
