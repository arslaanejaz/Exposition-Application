<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HallMapPageTest extends TestCase
{
    /**
     * Test Hall Page As Guest User
     *
     * @return void
     */
    public function testAsGuestUser()
    {
        $response = $this->get('/exposition-hall-map/1');
        $response->assertSee('Exposition Hall Map');
    }

    /**
     * Test Hall Page As Logged In User
     *
     * @return void
     */
    public function testAsUser()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
            ->get('/exposition-hall-map/1');
        $response->assertSee('Exposition Hall Map');
    }
}
