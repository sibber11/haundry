<?php

namespace Tests\Feature;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp():void
    {
        parent::setUp();

    }
    public function test_address_can_be_created(){
        $address = Address::create([
            'longitude' => 52.3654,
            'latitude' => 96.5321,
//            'country' => 'Bangladesh',
//            'region' => 'Dhaka',
            'area' => 'Uttara',
            'extra' => 'Sector: 9, House: 25, Apartment: 2B'
        ]);
        dump($address->refresh()->toJson(JSON_PRETTY_PRINT));
        $this->assertDatabaseCount(Address::class, 1);
    }
}
