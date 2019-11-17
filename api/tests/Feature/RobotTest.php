<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Robot;

class RobotTest extends TestCase
{
    public function testsRobotsCreate()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Ipsum',
            'description' => 'lorem',
            'sensing' => true,
            'movement' => true,
            'intelligence' => true
        ];

        $this->json('POST', '/api/robots', $payload, $headers)
            ->assertStatus(201);

    }

    public function testsRobotsUpdated()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $robot = factory(Robot::class)->create([
            'name' => 'Robot 1',
            'description' => 'description 1',
        ]);

        $payload = [
            'name' => 'Lorem',
            'description' => 'Ipsum',
        ];

        $this->json('PUT', '/api/robots/' . $robot->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => $robot->id,
                'name' => 'Lorem',
                'description' => 'Ipsum'
            ]);
    }

    public function testsRobotsDeleted()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $robot = factory(Robot::class)->create([
            'name' => 'title',
            'description' => 'description',
        ]);

        $this->json('DELETE', '/api/robots/' . $robot->id, [], $headers)
            ->assertStatus(204);
    }

    public function testRobotsListed()
    {
        factory(Robot::class)->create([
            'name' => 'First Robot',
            'description' => 'd'
        ]);

        factory(Robot::class)->create([
            'name' => 'Second Robot',
            'description' => 'd'
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/robots', [], $headers)
            ->assertStatus(200);

    }

}
