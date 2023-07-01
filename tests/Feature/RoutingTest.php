<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testBasicRouting(): void
    {
        $this->get('/settings')
            ->assertStatus(200)
            ->assertSeeText("settings");
    }

    public function testRedirect()
    {
        $this->get('/maintenance')
            ->assertRedirect('/settings');
    }

    public function testFallback()
    {
        $this->get("/asdasfa")
            ->assertSeeText("404 by Nityasa Dev");
    }

    public function testRouteParams()
    {
        $this->get('/product/1')
            ->assertSeeText('Product 1');

        $this->get('/product/1/items/a')
            ->assertSeeText("Product 1, Items a");
    }

    public function testRegexParams()
    {
        $this->get('/category/1')
            ->assertSeeText('Category 1');

        $this->get('/category/as')
            ->assertSeeText('a');
    }

    public function testNullableParams()
    {
        $this->get('/users/novin')
            ->assertSeeText('Users novin');

        $this->get('/users/')
            ->assertSeeText('Users 12');
    }


}

