<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_email()
    {
        Customer::factory()->create();
        $user = \App\Models\Customer::first();
        $this->withoutExceptionHandling();
        $response = $this->post(route('login'), [
            'email_or_phone' => $user->email,
            'password' => 'password'
        ]);
        $this->assertTrue(\Auth::check());
    }

    public function test_user_can_login_using_phone()
    {
        Customer::factory()->create();
        $user = \App\Models\Customer::first();
        $response = $this->post(route('login'), [
            'email_or_phone' => $user->phone,
            'password' => 'password'
        ]);
        $this->assertTrue(\Auth::check());
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('register'), [
            'name' => 's',
            'email' => 's@g.c',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '01815979207',
            'address' => 'Narayankul, Pubail, Gazipur',
            'terms' => 'true'
        ]);
        $response->assertRedirect();
        $this->assertTrue(\Auth::check());
//        dump(User::first()->toJson());
    }
}
