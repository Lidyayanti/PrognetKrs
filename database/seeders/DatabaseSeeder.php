<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public static $prodi = [
        'Teknologi Informasi',
        'Teknik Mesin',
        'Teknik Sipil',
        'Teknik Arsitektur'
    ];

    public function run()
    {
        Matakuliah::truncate();
        Mahasiswa::truncate();
        Matakuliah::insert([
            [
                'kode' => 'TI-ALG-1',
                'nama_matakuliah' => 'Algoritma',
                'semester' => 1,
                'sks' => 2,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-KBD-1',
                'nama_matakuliah' => 'Konsep Basis Data',
                'semester' => 1,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PMROG-1',
                'nama_matakuliah' => 'Pemrograman',
                'semester' => 1,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-TBD-2',
                'nama_matakuliah' => 'Teknologi Basis Data',
                'semester' => 2,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-JARKOM-2',
                'nama_matakuliah' => 'Jaringan Komputer dan Komunikas',
                'semester' => 2,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PBO-2',
                'nama_matakuliah' => 'Pemrograman Berorientasi Obyek',
                'semester' => 2,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PROGNET-3',
                'nama_matakuliah' => 'Pemrograman internet',
                'semester' => 3,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-RPL-3',
                'nama_matakuliah' => 'Rekayasa Perangkat Lunak',
                'semester' => 3,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-IMK-3',
                'nama_matakuliah' => 'Interaksi Manusia Komputer',
                'semester' => 3,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-KT-4',
                'nama_matakuliah' => 'Kecerdasan Tiruan',
                'semester' => 4,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PROGMOB-4',
                'nama_matakuliah' => 'Pemrograman mobile',
                'semester' => 4,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-IOT-4',
                'nama_matakuliah' => 'Internet of Things',
                'semester' => 4,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-ITFOR-5',
                'nama_matakuliah' => 'IT Forensic',
                'semester' => 5,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-AKB-5',
                'nama_matakuliah' => 'Analisis Kelayakan Bisnis',
                'semester' => 5,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-ERP-5',
                'nama_matakuliah' => 'Enterprise Resource Planning',
                'semester' => 5,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-IMP-6',
                'nama_matakuliah' => 'Inovasi dan Manajemen Produk',
                'semester' => 6,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-IMP-6',
                'nama_matakuliah' => 'Inovasi dan Manajemen Produk',
                'semester' => 6,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-IM-6',
                'nama_matakuliah' => 'Internet Marketing',
                'semester' => 6,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PT-6',
                'nama_matakuliah' => 'Project Technopreneurship',
                'semester' => 6,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PRMB-7',
                'nama_matakuliah' => 'Projek Riset Manajemen Bisnis',
                'semester' => 7,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-SMB-7',
                'nama_matakuliah' => 'Seminar Manajemen Bisnis',
                'semester' => 7,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-P1-7',
                'nama_matakuliah' => 'Pilihan 1',
                'semester' => 7,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-KKN-8',
                'nama_matakuliah' => 'Kuliah Kerja Nyata',
                'semester' => 8,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-PI-8',
                'nama_matakuliah' => 'Penulisan Ilmiah ',
                'semester' => 8,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
            [
                'kode' => 'TI-TK-8',
                'nama_matakuliah' => 'Tugas Akhir',
                'semester' => 8,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib',
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d')
            ],
        ]);

        Mahasiswa::insert([
            [
                'nim' => 1805551029,
                'nama' => 'Lidya Yanti',
                'alamat' => 'Jln.Banteng no.16',
                'telepon' => '081246082357',
                'email' => 'lidyayanti2511@gmail.com',
                'password' => Hash::make('alinlidya21'),
                'program_studi' => DatabaseSeeder::$prodi[0],
                'angkatan' => 2019,
                'foto_mahasiswa' => 'default.jpg',
            ]
        ]);
    }
}
