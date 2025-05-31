<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 123, Jakarta Selatan',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@example.com',
                'phone' => '082345678901',
                'address' => 'Jl. Pahlawan No. 45, Jakarta Pusat',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Agus Wijaya',
                'email' => 'agus@example.com',
                'phone' => '083456789012',
                'address' => 'Jl. Sudirman No. 78, Jakarta Barat',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'phone' => '084567890123',
                'address' => 'Jl. Gatot Subroto No. 56, Jakarta Selatan',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Rudi Hartono',
                'email' => 'rudi@example.com',
                'phone' => '085678901234',
                'address' => 'Jl. Thamrin No. 34, Jakarta Pusat',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Rina Susanti',
                'email' => 'rina@example.com',
                'phone' => '086789012345',
                'address' => 'Jl. Kebon Jeruk No. 12, Jakarta Barat',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
