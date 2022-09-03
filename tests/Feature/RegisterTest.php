<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_shouldnt_register_user_when_invalid_data()
    {
        $response = $this->post('/register');

        $response->assertRedirect()
          ->assertInvalid(['name', 'email', 'password']);
    }

    public function test_should_register_user_when_valid_data()
    {
        $response = $this->post('/register', [
          'name' => 'Leticia',
          'email'=>'leticia@gmali.net.br',
          'password' => 'topsecret',
          'password_confirmation' => 'topsecret',
          'company_name' => 'Empresa LTDA',
          'trading_name' => 'Nome Fantasia',
          'address' => 'Rua A',
          'phone' => '(42)3308654',
          'cnpj' => '1112345677222'
        ]);

        $response->assertRedirect()
          ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'leticia@gmali.net.br',
        ]);

        $this->assertDatabaseHas('establishments', [
            'cnpj' => '1112345677222',
        ]);
    }
}
