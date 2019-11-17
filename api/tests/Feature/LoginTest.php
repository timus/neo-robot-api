<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{

    public function testUserLoginsSuccessfully()
    {
        factory(User::class)->create([
            'email' => 'timus2001@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $input = ['email' => 'timus2001@gmail.com', 'password' => '123456'];

        $this->json('POST', 'api/login', $input)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);

    }
}
