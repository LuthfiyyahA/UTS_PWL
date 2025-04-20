<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     // Method ini digunakan untuk mengisi data awal ke dalam tabel 'ukm'
    public function run(): void
    {
        DB::table('ukm')->insert([
            [
                'ukm_id' => 1,
                'nama' => 'UKM Seni Tari',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang berfokus pada seni tari tradisional dan modern.',
                'ketua_umum' => 'Tiara Kirana Wijaya',
                'tahun_berdiri' => '2010',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 2,
                'nama' => 'UKM Musik dan Paduan Suara',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mengembangkan bakat di bidang musik.',
                'ketua_umum' => 'Budi Santoso',
                'tahun_berdiri' => '2012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 3,
                'nama' => 'UKM Olahraga',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mendukung kegiatan olahraga seperti futsal, basket, dan voli.',
                'ketua_umum' => 'Citra Dewi',
                'tahun_berdiri' => '2008',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 4,
                'nama' => 'UKM Fotografi',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang berfokus pada seni fotografi.',
                'ketua_umum' => 'Dian Pratama',
                'tahun_berdiri' => '2015',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 5,
                'nama' => 'UKM Pecinta Alam',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mencintai alam dan kegiatan outdoor.',
                'ketua_umum' => 'Eka Saputra',
                'tahun_berdiri' => '2005',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 6,
                'nama' => 'UKM Bahasa Inggris',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang meningkatkan kemampuan bahasa Inggris.',
                'ketua_umum' => 'Dika Bayu Nugroho',
                'tahun_berdiri' => '2011',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 7,
                'nama' => 'UKM Robotika',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang berfokus pada pengembangan robotika.',
                'ketua_umum' => 'Gilang Ramadhan',
                'tahun_berdiri' => '2018',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 8,
                'nama' => 'UKM Teater',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mendalami seni peran dan teater.',
                'ketua_umum' => 'Hana Sari',
                'tahun_berdiri' => '2009',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 9,
                'nama' => 'UKM Kewirausahaan',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mendukung pengembangan bisnis dan kewirausahaan.',
                'ketua_umum' => 'Irfan Maulana',
                'tahun_berdiri' => '2013',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 10,
                'nama' => 'UKM Debat',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang melatih kemampuan debat dan berpikir kritis.',
                'ketua_umum' => 'Joko Prasetyo',
                'tahun_berdiri' => '2016',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 11,
                'nama' => 'UKM Jurnalistik',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang berfokus pada penulisan berita dan jurnalistik.',
                'ketua_umum' => 'Kiki Amelia',
                'tahun_berdiri' => '2006',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 12,
                'nama' => 'UKM Film',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang mendalami seni perfilman.',
                'ketua_umum' => 'Lukman Hakim',
                'tahun_berdiri' => '2017',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ukm_id' => 13,
                'nama' => 'UKM Kuliner',
                'deskripsi' => 'Unit Kegiatan Mahasiswa yang berfokus pada seni memasak dan kuliner.',
                'ketua_umum' => 'Maya Sari',
                'tahun_berdiri' => '2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
