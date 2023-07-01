<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFacade(): void
    {

        $project = config("example.project");
        $projectFacades = Config::get("example.project");

        self::assertEquals($project, $projectFacades);

    }

    public function testFacadeMock()
    {

        Config::shouldReceive("get")
            ->with("example.project")
            ->andReturn("Laravel");

        $project = Config::get("example.project");

        self::assertEquals($project, "Laravel");
    }


}
