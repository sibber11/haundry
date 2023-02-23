<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\LaundryType;
use Illuminate\Database\Seeder;

class LaundryTypeSeeder extends Seeder
{
    private array $inputs = [
        'men' => [
            "Shirt(Half/Full)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "T-Shirt/Fatua" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Pant(Half/Full)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Pajama/Trouser" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Panjabi" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Jubba" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                ]
            ],
            "Ihram" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Mafler" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            //"Waist Coat",
            //"Suit Jacket",
            //"Suit Trouser",
            "Koti" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                ]
            ],
            "Sweater" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                ]
            ],
            "Ties" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Cloat/Blazer - Non Leather" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 80,
                ]
            ],
            "Coat/Blazer - Leather" => [
                'icon' => 'shirt',
                'services' => [
                    'wash & iron' => 200,
                    'dry clean' => 250,
                ]
            ],
            "Lungi" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Sherwani" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                ]
            ],
            "Hoodie" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 30,
                ]
            ],
            "Jacket (Non Leather)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 40,
                    'wash & iron' => 130,
                    'dry clean' => 150,
                ]
            ],
            "Leather Jacket" => [
                'icon' => 'shirt',
                'services' => [
                    'dry clean' => 300,
                ]
            ],
            "Overcoat" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 80,
                    'wash & iron' => 220,
                    'dry clean' => 300,
                ]
            ],
            "Sleeping Suit" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                    'wash & iron' => 100,
                    'dry clean' => 140,
                ]
            ],
            "Underwear/Under Shirt" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Socks" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
        ],
        'women' => [
            "Sharee (Cotton)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 50,
                ]
            ],
            "Sharee (Silk/Jamdani/Katan)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 60,
                ]
            ],
            "Sharee (Party)" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 80,
                ]
            ],
            "Salwar" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Kameez" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Dopatta/Orna" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Three Piece" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 30,
                ]
            ],
            "Blouse" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                ]
            ],
            "Burkha" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 30,
                ]
            ],
            "Ladies Shirt/Tops" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
            "Ladies Pant" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
            "Lehenga Suit" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 150,
                    'dry clean' => 300,
                ]
            ],
            "Gown" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 30,
                    'wash & iron' => 120,
                ]
            ],
            "Skirt" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
            "Night Dress/Maxi" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                    'wash & iron' => 60,
                ]
            ],
            "Hijab/Scarf" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
            "Frock" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                    'wash & iron' => 60,
                ]
            ],
            "Petticoat" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
            "Shwal - Non Woolen" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                    'wash & iron' => 100,
                ]
            ],
            "Shwal - Woolen" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 20,
                    'wash & iron' => 120,
                ]
            ],
            "Sweater/Cardigan" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 30,
                    'wash & iron' => 60,
                ]
            ],
            "Inner Wear" => [
                'icon' => 'shirt',
                'services' => [
                    'iron' => 10,
                    'wash & iron' => 40,
                ]
            ],
        ],
        /*'child' => [
            "Top Wear",
            "Bottom Wear",
            "Winter Wear",
            "Coat",
            "Jacket",
            "Dopatta/Orna"
        ],
        'household' => [
            "Bedsheet",
            "Bed Cover",
            "Pillow Cover",
            "Curtain (per fold/ring)",
            "Prayer Mat",
            "Apron",
            "Carpet (each SFT)",
            "Towel",
            "Mosquito Net",
            "Table Cover",
            "Sofa Cover",
            "Chair/Cushion Cover",
            "Pillow Cover",
            "Doll",
            "Katha",
            "Blanket (Single)",
            "Blanket (Double)",
            "Blanket/Katha Cover"
        ]*/
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
        foreach ($this->inputs as $category => $items) {
            $category_id = Category::where('name', $category)->first()->id;
            foreach ($items as $item => $array) {
                if (is_string($array)) {
                    $name = $array;
                } else {
                    $name = $item;
                }
                LaundryType::factory()->services($array['services'] ?? [])->create([
                    'name' => $name,
                    'icon' => $array['icon'] ?? 'shirt',
                    'category_id' => $category_id,
                ]);
            }
        }
        //LaundryType::factory()->count(20)->create();
    }
}
