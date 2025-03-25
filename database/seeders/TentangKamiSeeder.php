<?php

namespace Database\Seeders;

use App\Models\TentangKami;
use Illuminate\Database\Seeder;

class TentangKamiSeeder extends Seeder
{
    public function run(): void
    {
        TentangKami::create([
            'definisi' => 'HMTI Univesitas Telkom adalah sebuah organisasi yang beranggotakan dan mewadahi seluruh mahasiswa Prodi Teknik Industri dan Manajemen Rekayasa Fakultas Rekayasa Industri Universitas Telkom.',
            'kedudukan_peran' => 'HMTI Univesitas Telkom bersifat independen dan lembaga non-struktural. Fungsi HMTI di Telkom University adalah lembaga eksekutif dan organisasi yang bertugas untuk menampung aspirasi dari seluruh mahasiswa Teknik Industri dan Manajemen Rekayasa. Serta mengkoordinasikan dan merealisasikan segala kegiatan mahasiswa Teknik Industri. Selain itu, HMTI juga berperan untuk menciptakan kader-kader Teknik Industri yang pedulii dan berperan aktif dalam memajukkan Fakultas, Program Studi, dan Himpunan.',
            'visi' => 'Terwujudnya entitas HMTI Universitas Telkom yang memiliki siikap solutif, kredibel, dan dapat bersinergi dengan improvisasi dalam wadah yang ada di HMTI Universitas Telkom.',
            'misi' => [
                'Mengembangkan sumber daya entiitas HMTI Universitas Telkom dengan mengaplikasikan keilmuan teknik industri dan fungsi mahasiswa dalam kegiatan yang ada di HMTI',
                'Mengembangkan koordinasi antar entitas guna memaksimalkan fasilitas yang telah ada di HMTI',
                'Berkontribusi aktif sebagai jembatan untuk entitas HMTI Universitas Telkom dengan memperhatikan nilai-nilai yang ada di HMTI',
            ],
            'gambar_stuktural' => 'tentang-kami/struktural.png'
        ]);
    }
}