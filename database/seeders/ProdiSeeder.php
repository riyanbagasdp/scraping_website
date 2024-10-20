<?php

namespace Database\Seeders;

use App\Models\Prodi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::truncate();
        $prodi = [[
            'id_fakultas' => '1',
            'prodi_name' => 'Ilmu Sejarah',
        ], [
            'id_fakultas' => '1',
            'prodi_name' => 'Sastra Arab',
        ], [
            'id_fakultas' => '2',
            'prodi_name' => 'Akuntansi',
        ], [
            'id_fakultas' => '2',
            'prodi_name' => 'Ekonomi Pembangunan',
        ], [
            'id_fakultas' => '3',
            'prodi_name' => 'Hubungan Internasional',
        ], [
            'id_fakultas' => '3',
            'prodi_name' => 'Administrasi Negara',
        ]
        , [
            'id_fakultas' => '4',
            'prodi_name' => 'Agribisnis',
        ]
        , [
            'id_fakultas' => '4',
            'prodi_name' => 'Agroteknologi',
        ]
        , [
            'id_fakultas' => '5',
            'prodi_name' => 'Teknik Elektro',
        ]
        , [
            'id_fakultas' => '5',
            'prodi_name' => 'Teknik Industri',
        ]
        , [
            'id_fakultas' => '6',
            'prodi_name' => 'Pendidikan Akuntansi',
        ]
        , [
            'id_fakultas' => '6',
            'prodi_name' => 'Pendidikan Bahasa Inggris',
        ]
        , [
            'id_fakultas' => '7',
            'prodi_name' => 'Biologi',
        ]
        , [
            'id_fakultas' => '7',
            'prodi_name' => 'Farmasi',
        ]
        , [
            'id_fakultas' => '7',
            'prodi_name' => 'Fisika',
        ]
        , [
            'id_fakultas' => '8',
            'prodi_name' => 'Kedokteran',
        ]
        , [
            'id_fakultas' => '9',
            'prodi_name' => 'Peternakan',
        ]
        , [
            'id_fakultas' => '10',
            'prodi_name' => 'Desain Komunikasi Visual',
        ]
        , [
            'id_fakultas' => '10',
            'prodi_name' => 'Kriya Seni',
        ]
        , [
            'id_fakultas' => '11',
            'prodi_name' => 'Pendidikan Jasmani, Kesehatan, dan Rekreasi',
        ]
        , [
            'id_fakultas' => '11',
            'prodi_name' => 'Pendidikan Kepelatihan Olahraga',
        ]
        , [
            'id_fakultas' => '12',
            'prodi_name' => 'Informatika',
        ]
        , [
            'id_fakultas' => '13',
            'prodi_name' => 'Psikologi',
        ]
        , [
            'id_fakultas' => '6',
            'prodi_name' => 'Pendidian Teknik Informatika dan Komputer',
        ]
    ];

        Prodi::insert($prodi);
    }
}
