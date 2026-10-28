<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['Avanza 1.5 G CVT', 'Toyota', 275000000, 2024, 'CVT', 'Bensin'],
            ['Civic RS Turbo', 'Honda', 615000000, 2023, 'CVT', 'Bensin'],
            ['Pajero Sport Dakar', 'Mitsubishi', 560000000, 2022, 'Matic', 'Diesel'],
            ['Xenia 1.3 X', 'Daihatsu', 190000000, 2021, 'Manual', 'Bensin'],
            ['Ioniq 5 Prime', 'Hyundai', 780000000, 2024, 'Matic', 'Listrik'],
            ['Kijang Innova Zenix', 'Toyota', 440000000, 2023, 'CVT', 'Hybrid'],
        ];

        foreach ($data as [$nama, $brand, $harga, $tahun, $transmisi, $bahanBakar]) {
            Mobil::create([
                'nama' => $nama,
                'brand' => $brand,
                'harga' => $harga,
                'tahun' => $tahun,
                'transmisi' => $transmisi,
                'bahan_bakar' => $bahanBakar,
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341',
            ]);
        }
    }
}