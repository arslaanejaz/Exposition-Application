<?php

namespace Tests\Feature;

use Illuminate\Support\Testing\Fakes\BusFake;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterUser()
    {
        $faker = Faker\Factory::create();
        $response = $this->call('POST', '/register', [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'admin',
            '_token' => csrf_token()
        ]);
        $response->assertRedirect('/');
    }
}
