<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConfigTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testGetConfig()
    {
        $name = config("example.author.name");
        $email = config("example.email");
        $app = config("example.project");

        self::assertEquals("novin", $name);
        self::assertEquals("lamongan", $email);
        self::assertEquals("Laravel", $app);
    }
}
