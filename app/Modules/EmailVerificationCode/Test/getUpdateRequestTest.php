<?php

namespace App\Modules\EmailVerificationCode\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_emailVerificationCodes_request(): void
    {
        $response = $this->put('/YOUR URI');

        $response->assertStatus(200);

    }
}
