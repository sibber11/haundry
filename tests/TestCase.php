<?php

namespace Tests;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function auth_as_admin()
    {
        $this->actingAs(User::factory()->super_admin()->create(), 'admin');
    }

    public function auth_as_customer()
    {
        $this->actingAs(Customer::factory()->create());
    }
}
