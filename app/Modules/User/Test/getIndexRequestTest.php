<?php

namespace App\Modules\User\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_users_request(): void
    {
        $response = $this->get('/YOUR URI');

        $response->assertStatus(200);

    }
}
