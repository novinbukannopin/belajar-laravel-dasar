<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testView(): void
    {
        $this->get('hello')
            ->assertSeeText("Hello novin");

        $this->get('hello-again')
            ->assertSeeText("Hello novin");
    }

    public function testNestedView()
    {
        $this->get('/hello-world')
            ->assertSeeText('World novin');
    }

    public function testTemplateWithoutRoute()
    {
        $this->view('hello', ['name' => 'novin'])
            ->assertSeeText("Hello novin");


    }


}
