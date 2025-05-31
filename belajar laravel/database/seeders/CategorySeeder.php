<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Ayam Original',
                'description' => 'Ayam goreng original dengan berbagai level kepedasan',
                'image' => 'categories/original.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Ayam Premium',
                'description' => 'Ayam goreng premium dengan bumbu spesial dan topping istimewa',
                'image' => 'categories/premium.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Sides',
                'description' => 'Makanan pendamping untuk melengkapi menu utama',
                'image' => 'categories/sides.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Minuman',
                'description' => 'Minuman segar untuk menemani hidangan pedas',
                'image' => 'categories/drinks.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
