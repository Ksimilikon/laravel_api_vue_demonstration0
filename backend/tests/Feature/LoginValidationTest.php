<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $request=[
            'email'=>'',
            'password'=>''
        ];
        $response = $this->post('/login', $request);

        $response->assertJson([
            ''
        ]);
    }
}
