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
                'nama' => 'Departemen Human Resource',
                'logo' => 'departemen-pendidikan.png',
                'deskripsi' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'divisi' => 'Internal'
            ],
            [
                'nama' => 'Departemen Kaderisasi',
                'logo' => 'departemen-kominfo.png',
                'deskripsi' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'divisi' => 'Internal'
            ],
            [
                'nama' => 'Departemen Kemahasiswaan',
                'logo' => 'biro-administrasi.png',
                'deskripsi' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'divisi' => 'Internal'
            ],
            [
                'nama' => 'Departemen Akademik',
                'logo' => 'departemen-pendidikan.png',
                'deskripsi' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'divisi' => 'PSTI'
            ],
            [
                'nama' => 'Departemen Generasi Bisnis',
                'logo' => 'departemen-kominfo.png',
                'deskripsi' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'divisi' => 'PSTI'
            ],
            [
                'nama' => 'Departemen Riset & Kompetisi',
                'logo' => 'biro-administrasi.png',
                'deskripsi' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'divisi' => 'PSTI'
            ],
            [
                'nama' => 'Departemen Komunikasi & Informasi',
                'logo' => 'departemen-pendidikan.png',
                'deskripsi' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'divisi' => 'Eksternal'
            ],
            [
                'nama' => 'Biro Dedikasi Masyarakatt',
                'logo' => 'departemen-kominfo.png',
                'deskripsi' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'divisi' => 'Eksternal'
            ],
            [
                'nama' => 'Biro Public Relation',
                'logo' => 'biro-administrasi.png',
                'deskripsi' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'divisi' => 'Eksternal'
            ],
        ];

        foreach ($departemenBiros as $departemenBiro) {
            DepartemenBiro::create($departemenBiro);
        }
    }
}
