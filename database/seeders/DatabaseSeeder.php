<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $dekorasi = VendorType::create([
            'name' => 'Dekorasi',
            'description' => ''
        ])->id;
        $dokumentasi = VendorType::create([
            'name' => 'Dokumentasi',
            'description' => ''
        ])->id;
        $lighting = VendorType::create([
            'name' => 'Lighting',
            'description' => ''
        ])->id;
        $band = VendorType::create([
            'name' => 'Band',
            'description' => ''
        ])->id;
        $mc = VendorType::create([
            'name' => 'MC',
            'description' => ''
        ])->id;
        $mua = VendorType::create([
            'name' => 'MUA',
            'description' => ''
        ])->id;
        $sound = VendorType::create([
            'name' => 'Sound',
            'description' => ''
        ])->id;

        // Vendor Dekorasi
        Vendor::create([
            "vendor_type_id" => $dekorasi,
            "name" => "CLOVER",
            "price" => 45000000,
            "logo" => "vendor-logo/clover.jpg",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $dekorasi,
            "name" => "Galathia Decor",
            "price" => 50000000,
            "logo" => "vendor-logo/galathia.jpg",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $dekorasi,
            "name" => "Cassia Decoration",
            "price" => 17000000,
            "logo" => "vendor-logo/cassia.jpg",
            "description" => "",
        ]);

        // Vendor Dokumentasi
        Vendor::create([
            "vendor_type_id" => $dokumentasi,
            "name" => "Lemia Project",
            "price" => 22000000,
            "logo" => "vendor-logo/lemia.png",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $dokumentasi,
            "name" => "Buana&Co",
            "price" => 24000000,
            "logo" => "vendor-logo/buana.jpg",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $dokumentasi,
            "name" => "Hope Portraiture",
            "price" => 20000000,
            "logo" => "vendor-logo/hope.png",
            "description" => "",
        ]);

        // Vendor Sound
        Vendor::create([
            "vendor_type_id" => $sound,
            "name" => "JPMedia",
            "price" => 18000000,
            "logo" => "vendor-logo/jpmedia.jfif",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $sound,
            "name" => "Twinbrother Production",
            "price" => 15000000,
            "logo" => "vendor-logo/twin.jfif",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $sound,
            "name" => "Mega Sound Sytem",
            "price" => 16000000,
            "logo" => "vendor-logo/mega.jfif",
            "description" => "",
        ]);

        // Lighting Sound
        Vendor::create([
            "vendor_type_id" => $lighting,
            "name" => "LUMENS",
            "price" => 15000000,
            "logo" => "vendor-logo/lumen.png",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $lighting,
            "name" => "Lightworks",
            "price" => 25000000,
            "logo" => "vendor-logo/Lightworks.webp",
            "description" => "",
        ]);
        Vendor::create([
            "vendor_type_id" => $lighting,
            "name" => "Lasika Production",
            "price" => 25000000,
            "logo" => "vendor-logo/lasika.png",
            "description" => "",
        ]);

    }
}
