<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function test_example()
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
