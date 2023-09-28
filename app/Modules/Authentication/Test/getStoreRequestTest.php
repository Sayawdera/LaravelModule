<?php

namespace App\Modules\Authentication\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_authentications_request(): void
    {
        $response = $this->post('/YOUR URI');

        $response->assertStatus(200);

    }
}
