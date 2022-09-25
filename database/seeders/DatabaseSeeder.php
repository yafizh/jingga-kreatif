<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\VendorType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        VendorType::create([
            'name' => 'Dekorasi',
            'description' => ''
        ]);
        VendorType::create([
            'name' => 'Dokumentasi',
            'description' => ''
        ]);
        VendorType::create([
            'name' => 'Lighting',
            'description' => ''
        ]);
        VendorType::create([
            'name' => 'Band',
            'description' => ''
        ]);
        VendorType::create([
            'name' => 'MC',
            'description' => ''
        ]);
        VendorType::create([
            'name' => 'MUA',
            'description' => ''
        ]);
    }
}
