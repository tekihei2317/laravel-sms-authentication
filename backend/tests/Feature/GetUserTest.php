<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function ログインユーザーが取得できること()
    {
        $user = User::factory()->create();
        $this->postJson('/login', ['email' => $user->email, 'password' => 'password']);

        $response = $this->getJson('/api/user');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function ログインしていなければ認証エラーになること()
    {
        $response = $this->getJson('/api/user');

        $response->assertUnauthorized();
    }
}
