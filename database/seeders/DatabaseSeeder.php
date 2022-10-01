<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Newlywed;
use App\Models\Payment;
use App\Models\Theme;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorType;
use App\Models\Wedding;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'email' => 'jinggakreatif93@gmail.com',
            'password' => bcrypt('jinggakreatif93@gmail.com'),
        ]);

        Client::create([
            'user_id' => 2,
            'name' => 'Nurcholis',
            'phone_number' => '098766222322',
            'email' => 'jinggakreatif93@gmail.com',
        ]);

        Wedding::create([
            'client_id' => 1
        ]);

        Newlywed::create([
            'wedding_id' => 1,
            'nik' => '3525015201880002',
            'name' => 'Muhammad Putra',
            'birthplace' => 'Martapura',
            'birthdate' => '2000-01-01',
            'sex' => true,
            'father_name' => 'Putra',
            'mother_name' => 'Putri',
            'photo' => '',
        ]);

        Newlywed::create([
            'wedding_id' => 1,
            'nik' => '3525016005650004',
            'name' => 'Just Putri',
            'birthplace' => 'Banjarbaru',
            'birthdate' => '2000-05-05',
            'sex' => false,
            'father_name' => 'Putra 2',
            'mother_name' => 'Putri 2',
            'photo' => '',
        ]);

        Payment::create([
            'wedding_id' => 1,
            'name' => 'Pembayaran Vendor',
            'nominal' => 75000000
        ]);

        // Konsep
        Theme::create([
            'name' => 'Modern',
            'description' => '',
        ]);

        Theme::create([
            'name' => 'Tradisional',
            'description' => '',
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

        // Bank
        Bank::create([
            'bank_name' => 'BCA',
            'owner_name' => 'Nurcholis',
            'pin' => '123212233221',
        ]);

        Bank::create([
            'bank_name' => 'Mandiri',
            'owner_name' => 'Gusti',
            'pin' => '71263861823',
        ]);
    }
}
