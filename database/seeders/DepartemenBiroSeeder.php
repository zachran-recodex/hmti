<?php

namespace Database\Seeders;

use App\Models\DepartemenBiro;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            ],
            [
                'title' => 'Departemen Kaderisasi',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
            ],
            [
                'title' => 'Departemen Kemahasiswaan',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
            ],
            [
                'title' => 'Departemen Akademik',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
            ],
            [
                'title' => 'Departemen Generasi Bisnis',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
            ],
            [
                'title' => 'Departemen Riset & Kompetisi',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
            ],
            [
                'title' => 'Departemen Komunikasi & Informasi',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
            ],
            [
                'title' => 'Biro Dedikasi Masyarakatt',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
            ],
            [
                'title' => 'Biro Public Relation',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
            ],
        ];

        foreach ($departemenBiros as $departemenBiro) {
            DepartemenBiro::create($departemenBiro);
        }
    }
}
