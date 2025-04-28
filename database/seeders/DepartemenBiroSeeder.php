<?php

namespace Database\Seeders;

use App\Models\DepartemenBiro;
use Illuminate\Database\Seeder;

class DepartemenBiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemenBiros = [
            [
                'title' => 'Departemen Human Resource',
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Kaderisasi',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Kemahasiswaan',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Akademik',
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Generasi Bisnis',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Riset & Kompetisi',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Komunikasi & Informasi',
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'Eksternal'
            ],
            [
                'title' => 'Biro Dedikasi Masyarakatt',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'Eksternal'
            ],
            [
                'title' => 'Biro Public Relation',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'Eksternal'
            ],
        ];

        foreach ($departemenBiros as $departemenBiro) {
            DepartemenBiro::create($departemenBiro);
        }
    }
}
