<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jumbotron;
use App\Models\Other_setting;
use App\Models\Color;
use App\Models\Carier;
use App\Models\Fitur;
use App\Models\Contact;
use App\Models\Store_category;
use App\Models\Daftar_download;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Jumbotron::create([
            'name_pic' => 'jumbotron-removebg-preview.png',
            'title' => 'Bergabung Dengan Gas',
            'description' => 'Aplikasi Gas akan Membantumu dalam memantau stoc produc tokomu dan menjangau customer yang lebih luas.',
            'status' => 1,
        ]);
        Other_setting::create([
            'name' => 'Gas',
            'on_of_name' => 0,
            'logo' => 'srvphp_1662943062.png',
            'on_of_logo' => 1,
            'base_link' => 'http://gas-lp.test/',
            'g_play_link' => '#',
            'g_play_logo' => 'id_badge_web_generic-removebg-preview - Copy - Copy.png',
            'about' => 'Gas adalah aplikasi untuk memudahkan pelaku usaha menjangkau pelanggan yang lebih luar, melalui gerakan #ayoBelanjaTokoTetangga GAS mengaja untuk menjelajah dan mendukung usaha diseitarmu.'
        ]);
        Color::create([
            'primary_color' => 'rgb(255, 228, 74)',
            'secondary_color' => 'grey',
            'third_color' => 'orange',
            'text_color1' => 'black',
            'text_color2' => 'grey',
            'text_logo_color' => 'white',
        ]);
        Fitur::create([
            'logo_name' => 'png-transparent-cash-register-money-cashier-cashier-miscellaneous-retail-nuvola-thumbnail.png',
            'picture_name' => '202008281541-main.jpg',
            'title' => 'Mesin Kasir',
            'description' => 'Kami menyediakan mesin kasir yang terintegrasi dengan berbagai sistem.',
            'popular' => 1,
            'status' => 1,
            'urutan' => 1,
        ]);
        Fitur::create([
            'logo_name' => 'png-transparent-paper-barcode-scanners-escaner-book-angle-text-cartoon.png',
            'picture_name' => 'A181002001_photo2018-10-02_13_06_09photo.jpg',
            'title' => 'Scan Barcode',
            'description' => 'Kami menyediakan barcode scanner yang terintegrasi dengan berbagai sistem.',
            'popular' => 1,
            'status' => 1,
            'urutan' => 2,
        ]);
        Fitur::create([
            'logo_name' => 'pngtree-cartoon-hand-drawn-food-delivery-boy-image_2298186-removebg-preview.png',
            'picture_name' => 'download.jpeg',
            'title' => 'Daftar Kurir',
            'description' => 'Kami menyediakan barcode scanner yang terintegrasi dengan berbagai sistem.',
            'popular' => 1,
            'status' => 1,
            'urutan' => 3,
        ]);
        Fitur::create([
            'logo_name' => 'download-removebg-preview.png',
            'picture_name' => 'images.jpeg',
            'title' => 'Stock Opname',
            'description' => 'Sistem Kami memudahan anda melakukan stock opname.',
            'popular' => 1,
            'status' => 1,
            'urutan' => 4,
        ]);
        Fitur::create([
            'logo_name' => '61fEVszhFQL._AC_UF1000_1000_QL80_-removebg-preview.png',
            'picture_name' => 'aplikasi-kasir-toko-online-gobiz.jpg',
            'title' => 'Print Thermal',
            'description' => 'Printermal yang siap anda gunakan untuk mencetak nota.',
            'popular' => 1,
            'status' => 1,
            'urutan' => 5,
        ]);
        Fitur::create([
            'logo_name' => 'download__1_-removebg-preview.png',
            'picture_name' => 'download (2).jpeg',
            'title' => 'Maps',
            'description' => 'Aplikasi gas akan memmbantu anda memantau stok tokomu dan memperluas costomer.',
            'popular' => 0,
            'status' => 1,
            'urutan' => 6,
        ]);
        Store_category::create([
            'pic_name' => 'download (3).jpeg',
            'name' => 'Toko Baju',
            'description' => 'Toko Baju Anak Murah Bumiaji, Pusat Pemenuhan Kebutuhan Buah Hati.',
            'status' => 1
        ]);
        Store_category::create([
            'pic_name' => 'download (4).jpeg',
            'name' => 'Toko Bangunan',
            'description' => 'Toko Bahan Bangunan Tepercaya yang Punya Layanan Online.',
            'status' => 1
        ]);
        Store_category::create([
            'pic_name' => 'download (5).jpeg',
            'name' => 'Toko Roti',
            'description' => 'Toko Roti dan Kue Terpopular di New York, Tidak Kecewa!.',
            'status' => 1
        ]);
        Daftar_download::create([
            'title_daftar' => 'Daftaran tokomu sekarang.',
            'pic_daftar' => 'dftr-removebg-preview.png',
            'link_daftar' => '#',
            'logo_daftar' => 'id_badge_web_generic-removebg-preview.png',
            'title_download' => 'downloadan tokomu sekarang.',
            'pic_download' => 'dlt-removebg-preview.png',
            'link_download' => '#',
            'logo_download' => 'id_badge_web_generic-removebg-preview - Copy.png',
            'status' => 1
        ]);
        Carier::create([
            'picture_name' => 'images.png',
            'title' => 'Comunication Marketer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error saepe cupiditate laborum quaerat cum fugit in quia aperiam voluptates est!',
            'status' => 1,
        ]);
        Carier::create([
            'picture_name' => 'hjfcsimages.png',
            'title' => 'Bos',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error saepe cupiditate laborum quaerat cum fugit in quia aperiam voluptates est!',
            'status' => 1,
        ]);
        Carier::create([
            'picture_name' => 'asjhaimages.jpeg',
            'title' => 'Kurir',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error saepe cupiditate laborum quaerat cum fugit in quia aperiam voluptates est!',
            'status' => 1,
        ]);
        Contact::create([
            'name' => 'phone',
            'description' => '09876545678',
            'status' => 1,
        ]);
        Contact::create([
            'name' => 'email',
            'description' => 'email.nya@mail.ml',
            'status' => 1,
        ]);
    }
}
