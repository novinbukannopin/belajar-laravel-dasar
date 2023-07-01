<?php

namespace App\Http\Controllers;

use App\Service\HelloService;

class HelloController extends Controller
{

    private HelloService $helloService;

    /**
     * @param HelloService $helloService
     */
    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }


    public function hello(string $name): string
    {
        return $this->helloService->hello($name);
    }
}
