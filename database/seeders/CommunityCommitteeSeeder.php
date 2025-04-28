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
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Industrial Competition Community',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Koma Creative',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Maroon Army',
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Community Motor Telkom University',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Community of Tentor',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Society',
                'logo' => null,
                'description' => 'Departemen yang bertanggung jawab atas pengembangan pendidikan mahasiswa HMTI',
                'category' => 'Community',
            ],
            [
                'title' => 'Invention',
                'logo' => null,
                'description' => 'Departemen yang mengelola komunikasi dan informasi HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'SEHATI',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'LEGION',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'Increase',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'Inaugurasi',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'ORATIONS',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
            [
                'title' => 'INFADE',
                'logo' => null,
                'description' => 'Biro yang menangani administrasi dan kesekretariatan HMTI',
                'category' => 'Committee',
            ],
        ];

        foreach ($communityCommittees as $communityCommittee) {
            CommunityCommittee::create($communityCommittee);
        }
    }
}
