<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->post('/register', [
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

        $user = User::where('email', 'leticia@gmali.net.br')->first();
        $this->actingAs($user);
    }


    public function test_should_show_create_product_form()
    {
        $response = $this->get('/product/create');
        $response->assertOk()
          ->assertViewIs('products.create')
          ->assertSeeText('Criar Produto');
    }

    public function test_shouldnt_create_product_when_invalid_date()
    {
        $response = $this->post('/product');
        $response->assertRedirect()
          ->assertSessionHasErrors();
    }

}
