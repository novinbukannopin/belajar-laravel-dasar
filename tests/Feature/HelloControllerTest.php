<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testController(): void
    {
        $this->get('/controller/hello')
            ->assertSeeText("Halo World");

        $this->get('/controller/hello/novin')
            ->assertSeeText("Halo novin");
    }
}
