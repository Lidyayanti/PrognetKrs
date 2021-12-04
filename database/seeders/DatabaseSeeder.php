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
        Matakuliah::insert([
            [
                'kode' => 'TI-TBD-1',
                'nama_matakuliah' => 'TBD',
                'semester' => 2,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib'
            ],
            [
                'kode' => 'TI-KBD-1',
                'nama_matakuliah' => 'KBD',
                'semester' => 1,
                'sks' => 3,
                'prodi' => DatabaseSeeder::$prodi[0],
                'status_mk' => 'wajib'
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
