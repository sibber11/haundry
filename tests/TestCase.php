<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function auth_as_admin()
    {
        $this->actingAs(User::factory()->super_admin()->create(), 'admin');
    }
}
