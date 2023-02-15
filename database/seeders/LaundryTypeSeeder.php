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
                'wash & fold' => 25,
            ]
        ],
        'pant' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        't-shirt' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'panjabi' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'pajama' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'kamij' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'selowar' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'orna' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'fotua' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'jubba' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 20,
                'wash & fold' => 25,
            ]
        ],
        'epron' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'balis o kushum cover' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'sweter' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 30,
                'wash & fold' => 25,
            ]
        ],
        'sofa cover' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 30,
                'wash & fold' => 25,
            ]
        ],
        'borka' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 40,
                'wash & fold' => 25,
            ]
        ],
        'shal' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 45,
                'wash & fold' => 25,
            ]
        ],
        'jacket' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 40,
                'wash & fold' => 25,
            ]
        ],
        'bed cador' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 45,
                'wash & fold' => 25,
            ]
        ],
        'shuti shari' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 60,
                'wash & fold' => 25,
            ]
        ],
        'silk shari' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 80,
                'wash & fold' => 25,
            ]
        ],
        'jorjet shari' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 80,
                'wash & fold' => 25,
            ]
        ],
        'jamdani' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 80,
                'wash & fold' => 25,
            ]
        ],
        'blouse' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'coat' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 100,
                'wash & fold' => 25,
            ]
        ],
        'coat(hanger, poly)' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 120,
                'wash & fold' => 25,
            ]
        ],
        'long kamij' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 12,
                'wash & fold' => 25,
            ]
        ],
        'silk porda, kuci' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 8,
                'wash & fold' => 25,
            ]
        ],
        'suti porda, kuci' => [
            'icon' => 'shirt',
            'services' => [
                'iron' => 7,
                'wash & fold' => 25,
            ]
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
            LaundryType::factory()->services($array['services'] ?? [])->create([
                'name' => $type,
                'icon' => $array['icon'],
            ]);
        }
        //LaundryType::factory()->count(20)->create();
    }
}
