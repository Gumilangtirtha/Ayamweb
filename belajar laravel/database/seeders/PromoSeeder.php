<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promos = [
            [
                'code' => 'JOSSEXTREME',
                'description' => 'Beli 2 Ayam Goreng Extreme Spicy, Gratis 1 Minuman Segar',
                'discount_percent' => 10.00,
                'discount_amount' => 0.00,
                'min_order_amount' => 70000.00,
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'is_active' => true,
            ],
            [
                'code' => 'WELCOME10',
                'description' => 'Diskon 10% untuk pelanggan baru',
                'discount_percent' => 10.00,
                'discount_amount' => 0.00,
                'min_order_amount' => 50000.00,
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'is_active' => true,
            ],
            [
                'code' => 'HEMAT20K',
                'description' => 'Potongan Rp 20.000 untuk pembelian minimal Rp 100.000',
                'discount_percent' => 0.00,
                'discount_amount' => 20000.00,
                'min_order_amount' => 100000.00,
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'is_active' => true,
            ],
            [
                'code' => 'WEEKEND25',
                'description' => 'Diskon 25% khusus weekend untuk pembelian minimal Rp 150.000',
                'discount_percent' => 25.00,
                'discount_amount' => 0.00,
                'min_order_amount' => 150000.00,
                'start_date' => now()->startOfWeek(),
                'end_date' => now()->endOfWeek()->addWeeks(8),
                'is_active' => true,
            ],
            [
                'code' => 'GRATISFRIES',
                'description' => 'Gratis French Fries untuk pembelian minimal Rp 75.000',
                'discount_percent' => 0.00,
                'discount_amount' => 15000.00,
                'min_order_amount' => 75000.00,
                'start_date' => now(),
                'end_date' => now()->addWeeks(2),
                'is_active' => true,
            ],
            [
                'code' => 'JOSSFAMILY',
                'description' => 'Diskon 15% untuk paket keluarga (min. pembelian Rp 200.000)',
                'discount_percent' => 15.00,
                'discount_amount' => 0.00,
                'min_order_amount' => 200000.00,
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'is_active' => true,
            ],
        ];

        foreach ($promos as $promo) {
            Promo::create($promo);
        }
    }
}
