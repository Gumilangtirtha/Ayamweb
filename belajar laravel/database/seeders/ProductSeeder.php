<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 1, // Assuming category_id 1 is for regular chicken
                'name' => 'Ayam Goreng Original',
                'description' => 'Ayam goreng renyah dengan bumbu original yang gurih, cocok untuk yang tidak terlalu suka pedas. Digoreng dengan teknik khusus untuk menghasilkan tekstur crispy di luar dan juicy di dalam.',
                'price' => 25000,
                'image' => 'products/ayam-original.jpg',
                'spice_level' => 1,
                'is_premium' => false,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Ayam Goreng Medium Spicy',
                'description' => 'Ayam goreng dengan tingkat kepedasan sedang, cocok untuk penikmat pedas pemula. Dibalut dengan bumbu rahasia dan cabai pilihan yang memberikan sensasi pedas yang pas.',
                'price' => 28000,
                'image' => 'products/ayam-medium.jpg',
                'spice_level' => 3,
                'is_premium' => false,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Ayam Goreng Extreme Spicy',
                'description' => 'Ayam goreng dengan tingkat kepedasan ekstrim, tantangan bagi pecinta pedas sejati! Menggunakan campuran cabai rawit pilihan dan bumbu rahasia yang membuat ketagihan.',
                'price' => 35000,
                'image' => 'products/ayam-extreme.jpg',
                'spice_level' => 5,
                'is_premium' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 2, // Assuming category_id 2 is for premium chicken
                'name' => 'Ayam Cheese Explosion',
                'description' => 'Ayam goreng dengan saus keju meleleh yang creamy dan lezat, sedikit pedas. Keju premium yang meleleh di atas ayam goreng crispy menciptakan kombinasi rasa yang sempurna.',
                'price' => 32000,
                'image' => 'products/ayam-cheese.jpg',
                'spice_level' => 2,
                'is_premium' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Ayam Sambal Matah',
                'description' => 'Ayam goreng dengan sambal matah khas Bali yang segar dan pedas. Perpaduan bawang merah, serai, cabai, dan jeruk limau memberikan sensasi segar yang menggugah selera.',
                'price' => 33000,
                'image' => 'products/ayam-sambal-matah.jpg',
                'spice_level' => 4,
                'is_premium' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 3, // Assuming category_id 3 is for sides
                'name' => 'French Fries Spicy',
                'description' => 'Kentang goreng renyah dengan taburan bumbu pedas spesial. Cocok sebagai pendamping menu ayam goreng atau dinikmati sebagai camilan.',
                'price' => 15000,
                'image' => 'products/french-fries.jpg',
                'spice_level' => 2,
                'is_premium' => false,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
