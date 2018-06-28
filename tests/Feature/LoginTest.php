<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmptyLogin()
    {
        $response = $this->call('POST', '/login', [
            'email' => '',
            'password' => '',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $response = $this->call('POST', '/login', [
            'email' => 'admin@admin.com',
            'password' => 'admin',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/home');
    }
}
