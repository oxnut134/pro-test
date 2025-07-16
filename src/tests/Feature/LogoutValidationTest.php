<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
  public function testSuccessLogout(): void
    {
        $response = $this->post('/logout', [
        ]);
        //echo "\nレスポンスコード: ", $response->status(), "\n";
        $response->assertStatus(302);
    }
}
