<?php

namespace Database\Seeders;

use App\Models\CommunityCommittee;
use Illuminate\Database\Seeder;

class CommunityCommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communityCommittees = [
            [
                'title' => 'Incoustic',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Industrial Competition Community',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Koma Creative',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Maroon Army',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Community Motor Telkom University',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Community of Tentor',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Society',
                'logo' => 'departemen-pendidikan.png',
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Invention',
                'logo' => 'departemen-kominfo.png',
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'SEHATI',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'LEGION',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'Increase',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'Inaugurasi',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'ORATIONS',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'INFADE',
                'logo' => 'biro-administrasi.png',
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
        ];

        foreach ($communityCommittees as $communityCommittee) {
            CommunityCommittee::create($communityCommittee);
        }
    }
}
