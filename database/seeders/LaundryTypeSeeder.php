<?php

namespace Database\Seeders;

use App\Models\LaundryType;
use Illuminate\Database\Seeder;

class LaundryTypeSeeder extends Seeder
{
    private array $inputs = [
        'men' => ['shirt'],
        'women' => ['saree'],
        'child' => ['pant'],
        'household' => ['blanket'],
        'shirt'
    ];
    private int $default = 10;
    private array $types = [
        'shirt' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash' => 12,
            ]
        ],
        'pant' => [
            'icon' => 'shirt',
        ],
        't-shirt' => [
            'icon' => 'shirt',
        ],
        'panjabi' => [
            'icon' => 'shirt',
        ],
        'pajama' => [
            'icon' => 'shirt',
        ],
        'kamij' => [
            'icon' => 'shirt',
        ],
        'selowar' => [
            'icon' => 'shirt',
        ],
        'orna' => [
            'icon' => 'shirt',
        ],
        'fotua' => [
            'icon' => 'shirt',
        ],
        'jubba' => [
            'icon' => 'shirt',
        ],
        'epron' => [
            'icon' => 'shirt',
        ],
        'balis o kushum cover' => [
            'icon' => 'shirt',
        ],
        'sweter' => [
            'icon' => 'shirt',
        ],
        'sofa cover' => [
            'icon' => 'shirt',
        ],
        'borka' => [
            'icon' => 'shirt',
        ],
        'shal' => [
            'icon' => 'shirt',
        ],
        'jacket' => [
            'icon' => 'shirt',
        ],
        'bet cador' => [
            'icon' => 'shirt',
        ],
        'suti shari' => [
            'icon' => 'shirt',
        ],
        'silk shari' => [
            'icon' => 'shirt',
        ],
        'jorjet shari' => [
            'icon' => 'shirt',
        ],
        'jamdani' => [
            'icon' => 'shirt',
        ],
        'blouse' => [
            'icon' => 'shirt',
        ],
        'coat' => [
            'icon' => 'shirt',
        ],
        'coat(w hanger and poly)' => [
            'icon' => 'shirt',
        ],
        'long kamij' => [
            'icon' => 'shirt',
        ],
        'silk porda, kuci' => [
            'icon' => 'shirt',
        ],
        'suti porda, kuci' => [
            'icon' => 'shirt',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        foreach ($this->types as $type => $array) {
            LaundryType::factory()->price($array->services ?? [])->create([
                'name' => $type,
                'icon' => $array['icon'],
            ]);
        }
        //LaundryType::factory()->count(20)->create();
    }
}
