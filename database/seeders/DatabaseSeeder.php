<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Employee;
use App\Models\MeetingHistory;
use App\Models\Newlywed;
use App\Models\Payment;
use App\Models\Theme;
use App\Models\ThemeImage;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorImage;
use App\Models\VendorType;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        // User::create([
        //     'email' => 'jinggakreatif93@gmail.com',
        //     'password' => bcrypt('jinggakreatif93@gmail.com'),
        // ]);

        // Client::create([
        //     'user_id' => 2,
        //     'name' => 'Nurcholis',
        //     'phone_number' => '098766222322',
        //     'email' => 'jinggakreatif93@gmail.com',
        // ]);

        // Wedding::create([
        //     'client_id' => 1
        // ]);

        // Newlywed::create([
        //     'wedding_id' => 1,
        //     'nik' => '3525015201880002',
        //     'name' => 'Muhammad Putra',
        //     'birthplace' => 'Martapura',
        //     'birthdate' => '2000-01-01',
        //     'sex' => true,
        //     'father_name' => 'Putra',
        //     'mother_name' => 'Putri',
        //     'photo' => '',
        // ]);

        // Newlywed::create([
        //     'wedding_id' => 1,
        //     'nik' => '3525016005650004',
        //     'name' => 'Just Putri',
        //     'birthplace' => 'Banjarbaru',
        //     'birthdate' => '2000-05-05',
        //     'sex' => false,
        //     'father_name' => 'Putra 2',
        //     'mother_name' => 'Putri 2',
        //     'photo' => '',
        // ]);

        // MeetingHistory::create([
        //     'wedding_id' => 1,
        //     'topic' => 'Pertemuan 1',
        //     'meeting_date' => Carbon::now(),
        //     'meeting_time' => Carbon::now(),
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae optio odio cum asperiores rem delectus aut laborum maxime culpa sunt. Exercitationem voluptatem praesentium nesciunt accusamus fugit explicabo laboriosam dolorem autem!',
        //     'photo' => 'meeting-photo/cafe1.avif'
        // ]);

        // MeetingHistory::create([
        //     'wedding_id' => 1,
        //     'topic' => 'Pertemuan 2',
        //     'meeting_date' => Carbon::now(),
        //     'meeting_time' => Carbon::now(),
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ipsum, quisquam neque nobis molestiae quam qui numquam. Possimus harum nostrum iste architecto cumque distinctio, officia iure placeat minus et voluptas?
        //     Iusto doloremque, ab nisi, sunt ipsam quidem sit laboriosam itaque hic neque tempora commodi facilis? Dolore nesciunt saepe maxime odio delectus? Accusantium nostrum libero odit, ea eaque earum necessitatibus rerum?
        //     Odit iusto, voluptatem aspernatur ducimus reprehenderit aliquam harum quasi porro officia omnis nulla ut necessitatibus ea beatae consequuntur, quos, a sapiente cumque. Eos, laborum repellat praesentium impedit dolore dignissimos nemo.
        //     Exercitationem repudiandae officia reprehenderit tenetur maiores fugit aliquam, quae quibusdam quod impedit enim sequi nostrum debitis, dolorem provident asperiores deleniti laboriosam. Similique quia saepe vel nam earum explicabo sed aperiam.
        //     Quam rem minima fugiat. Facere inventore voluptate dolorum eius architecto nihil nulla iusto hic perferendis? Incidunt, ab illo! Ad libero quam voluptatem deserunt amet quo reprehenderit et molestiae autem suscipit?
        //     Quam labore voluptatem illum illo consequuntur nesciunt eligendi quidem obcaecati praesentium nihil deleniti aliquam, eum ipsam neque beatae quia laborum dolores facilis. Enim laudantium nihil atque voluptatum mollitia libero aliquam.
        //     Sapiente quaerat rerum nesciunt deserunt odit repudiandae minus, quos praesentium itaque ad laudantium corrupti nostrum expedita eveniet dolorum cumque fugiat reiciendis voluptate eligendi nemo doloremque earum ipsum. Voluptate, possimus nesciunt.
        //     Doloremque deleniti beatae quae tempore aspernatur facere praesentium harum fugiat corporis eligendi dolores dolore provident corrupti nobis inventore non quo molestias ab eos, qui vel laborum debitis. Eaque, cupiditate nostrum.
        //     Sint perspiciatis maiores iste sit harum eos voluptates, suscipit nesciunt tempora, ut nihil magni beatae dolor enim non porro error nisi repellat excepturi quos doloribus inventore a. Cupiditate, qui consequatur.
        //     Eum facilis eveniet odio sequi corrupti provident doloremque porro cupiditate dolores debitis ipsum sint laboriosam, magni accusantium, numquam aperiam commodi harum? Id maxime inventore itaque adipisci! Deleniti aliquam magni est?',
        //     'photo' => 'meeting-photo/cafe2.avif'
        // ]);

        // Payment::create([
        //     'wedding_id' => 1,
        //     'name' => 'Pembayaran Vendor',
        //     'nominal' => 75000000
        // ]);

        // Konsep
        Theme::create([
            'name' => 'Modern',
            'thumbnail' => 'theme-thumbnail/modern.jpg',
            'description' => 'Pernikahan modern biasanya dipenuhi dengan garis-garis bersih, bentuk geometris, dan desain yang minimalis. Agar tidak terkesan datar, gunakan sesuatu yang membuat Anda menonjol seperti gaun pengantin dengan warna selain putih, dekorasi dengan warna yang lebih tegas.',
        ]);

        ThemeImage::create([
            'theme_id' => 1,
            'image' => 'theme-images/1.jpg'
        ]);
        ThemeImage::create([
            'theme_id' => 1,
            'image' => 'theme-images/2.jpg'
        ]);
        ThemeImage::create([
            'theme_id' => 1,
            'image' => 'theme-images/3.jpg'
        ]);

        Theme::create([
            'name' => 'Tradisional',
            'thumbnail' => 'theme-thumbnail/traditional.jpg',
            'description' => 'Jika Anda ingin pernikahan dengan konsep antik, cari inspirasi dari pernikahan-pernikahan dari beberapa dekade yang lalu. Salah satu cara termudah adalah mencari gaun pengantin dan riasan di zaman tersebut. Untuk dekor, Anda bisa menggunakan benda-benda antik, seperti pintu atau tempat duduk yang using atau mobil klasik seperti Porsche atau Volkswagen.',
        ]);

        ThemeImage::create([
            'theme_id' => 2,
            'image' => 'theme-images/4.jpg'
        ]);
        ThemeImage::create([
            'theme_id' => 2,
            'image' => 'theme-images/5.jpg'
        ]);
        ThemeImage::create([
            'theme_id' => 2,
            'image' => 'theme-images/6.jpg'
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
            "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi debitis quaerat suscipit adipisci harum quisquam? Culpa, enim neque excepturi amet asperiores error consequuntur voluptas tempora nam laboriosam laudantium reiciendis at.
            Porro commodi reprehenderit consequatur veniam quisquam a provident fugiat, voluptate aut doloribus esse! Pariatur nihil distinctio eaque, soluta eum quidem eius maiores aperiam in. Labore eligendi commodi laboriosam eveniet mollitia.
            Aperiam rerum repellat unde consectetur illo alias eveniet impedit possimus dolores, ipsam nostrum recusandae. Eaque cum commodi reiciendis, voluptatibus fuga accusamus fugiat sed corporis ea! Rem similique eveniet odio voluptate.",
        ]);

        VendorImage::create([
            'vendor_id' => 1,
            'image' => 'vendor-images/1.jpg'
        ]);
        VendorImage::create([
            'vendor_id' => 1,
            'image' => 'vendor-images/2.jpg'
        ]);
        VendorImage::create([
            'vendor_id' => 1,
            'image' => 'vendor-images/3.jpg'
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

        Employee::create([
            'name' => 'Muhammad Syafiq',
            'position' => 'Designer',
            'phone_number' => '087811223344',
            'email' => 'syafiq@yahoo.com',
            'photo' => 'employee-photo/1.jpg',
        ]);

        Employee::create([
            'name' => 'Nurcholis',
            'position' => 'Director',
            'phone_number' => '087842312321',
            'email' => 'nurcholis@yahoo.com',
            'photo' => 'employee-photo/2.jpg',
        ]);

        Employee::create([
            'name' => 'Gusti',
            'position' => 'Wedding Management',
            'phone_number' => '087842123212',
            'email' => 'gusti@yahoo.com',
            'photo' => 'employee-photo/3.jpg',
        ]);

    }
}
