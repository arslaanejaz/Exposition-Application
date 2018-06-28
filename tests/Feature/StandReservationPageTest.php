<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StandReservationPageTest extends TestCase
{
    /**
     * Test Hall Page As Guest User
     *
     * @return void
     */
    public function testAsGuestUser()
    {
        $response = $this->get('/location/1/stand-reservation/2');
        $response->assertRedirect('/login');
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
            ->get('/location/1/stand-reservation/2');
        $response->assertSee('Reservation Page');
    }
}
