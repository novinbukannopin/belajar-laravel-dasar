<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetENV(): void
    {
        $env = env("YOUTUBE");
        self::assertEquals("NOVIN", $env);
    }

    public function testDefaultValue()
    {
        $env = env("AUTHOR", "NOVIN");
        self::assertEquals("NOVIN", $env);
    }

}
