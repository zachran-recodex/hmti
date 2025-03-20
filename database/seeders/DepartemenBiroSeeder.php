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
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Kaderisasi',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Kemahasiswaan',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'Internal'
            ],
            [
                'title' => 'Departemen Akademik',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Generasi Bisnis',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Riset & Kompetisi',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'PSTI'
            ],
            [
                'title' => 'Departemen Komunikasi & Informasi',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'division' => 'Eksternal'
            ],
            [
                'title' => 'Biro Dedikasi Masyarakatt',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'division' => 'Eksternal'
            ],
            [
                'title' => 'Biro Public Relation',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'division' => 'Eksternal'
            ],
        ];

        foreach ($departemenBiros as $departemenBiro) {
            DepartemenBiro::create($departemenBiro);
        }
    }
}
