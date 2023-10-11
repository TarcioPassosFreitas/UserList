<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Domain\User;
use App\Domain\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

use Mockery;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testIndexReturnsExpectedStructure()
    {
        // Mock UserRepository using Mockery
        $userRepository = Mockery::mock(UserRepository::class);

        // Create sample data
        $users = [
            new User(1, 'John Doe', 'john@example.com'),
            new User(2, 'Jane Doe', 'jane@example.com'),
        ];

        // Define the expected behavior
        $userRepository->shouldReceive('all')->once()->andReturn($users);

        // Bind the UserRepository interface to the mock object
        $this->app->instance(UserRepository::class, $userRepository);

        // Call the index method and assert response structure
        $response = $this->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users');
        $response->assertViewIs('users.index');

        $returnedData = $response->viewData('users');
        $this->assertInstanceOf(LengthAwarePaginator::class, $returnedData);
    }
}