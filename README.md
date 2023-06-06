<h1>Landing Pages Web</h1>

<h2>Petunjuk Instalasi</p>
<ul>
    <li>Silahkan download projek yang ada di dalam repository</li>
    <li>Instal dependensi laravel melalui composer dengan : <code>composer install</code></li>
    <li>Instal dependensi javascript melalui npm dengan : <code>npm install</code></li>
    <li>Pindahkan file asset.rar menuju folder storage/app/public kemudian ekstract. <em>Hal ini akan mengekstrak gambar yang diperlukan pada tampilan landing page.</li>
    <li>Lakukan link antara folder storage dengan folder public dengan : <code>php artisan storage:link</code>. dengan begitu folder storage terhubung dengan folder public.</li>
    <li>Hubungkan project dengan database</li>
    <ul>
        <li>Buka file .env</li>
        Jika file env tidak ada, gunakan <code>.env.example</code> hapus bagian <code>.example</code>
        <li>hubungkan dengan database yang anda gunakan</li>
        <li>Tambahkan <code>FILESYSTEM_DRIVER=public</code> pada file .env untuk mengatur storage yang digunakan</li>
        <li>Ganti juga code : <code>APP_NAME=Laravel</code>. Ganti <strong>Laravel</strong> dengan nama aplikasi yang anda mau.
    </ul>
    <li>Lakukan migrasi dengan : <code>php artisan migrate</code> atau <code>php artisan migrate:fresh</code></li>
    <li>Lakukan seeder untuk mengisi database dengan : <code>php artisan db:seed</code></li>
    <li>Aplikasi landing page anda siap digunakan</li>
</ul>

<h2>Menjalankan aplikasi</h2>
<ul>
    <li>Masuk ke berkas projek yang sudah di instal.</li>
    <li>Jalankan server melalui artisan dengan : <code>php artisan serve</code></li>
    <li>Aplikasi anda siap di akses secara local pada halaman yang diberikan oleh server local anda (mis: http://127.0.0.1:8000)</li>
    <li>silahkan akses http://127.0.0.1:8000 jika server menjalankna halaman tersebut</li>
 </ul>
 <h2>Routing</h2>
 <p>Halaman utama landing page ada pada route <code>'/'</code></p>
 <p>Pada halaman landing page akan ada banyak typo yang sengaja saya buat. Anda bisa mengganti typo tersebutmelalui dashboard.</p>
 <h2>Register dan login</h2>
 <p>Silahkan lakukan registrasi user pada route '/register'. setelah sukses melakukan register anda akan berada di halaman dashboard dengan route <code>'/home'</code></p>
 <p>Untuk mengedit halaman landingpage anda dapat menuju route '/about'. Anda akan disuguhkan form yang berisi data-data pada landingpage saat ini, silahkan lakukan editing sesuai preferensi yang anda inginkan.</p>
 <p>Untuk login ke aplikasi anda dapat menuju route <code>'/login'</code></p>
 
 <h3>Sekian dan terimakasih</h3>
 <p>Aplikasi ini saya buat dalam waktu 1 malam sehingga masih banyak yang dapat diperbaiki. Saya masih tetap melakukan perbaiki dari aplikasi ini agar dapar digunakan lebih <em>luwes</em>. Namun sebelum aplikasi ini jadi tidak akan ada update pada repositori ini. Jadi jika anda ingin menggunakannya dan memperbaikinya saya sangat terbuka dan mempersilahkan</em>.
