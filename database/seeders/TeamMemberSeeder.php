<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamMember; // Import the TeamMember model

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamMember::create([
            'name' => 'Chika Putri',
            'role' => 'CEO',
            'photo_url' => 'https://picsum.photos/150/150?random=1',
            'biodata' => 'Chika Putri adalah CEO kami yang berdedikasi, memimpin visi dan strategi perusahaan dengan inovasi dan semangat. Dengan pengalaman bertahun-tahun di industri, ia memastikan setiap produk Es Telang ZtoA mencapai standar kualitas tertinggi.'
        ]);

        TeamMember::create([
            'name' => 'Anang Ridho',
            'role' => 'CTO',
            'photo_url' => 'https://picsum.photos/150/150?random=2',
            'biodata' => 'Anang Ridho, CTO kami, adalah otak di balik teknologi dan operasional kami. Keahliannya dalam sistem dan efisiensi memastikan bahwa proses produksi dan distribusi berjalan lancar dan inovatif.'
        ]);

        TeamMember::create([
            'name' => 'Zalfa Tri',
            'role' => 'Lead Designer',
            'photo_url' => 'https://picsum.photos/150/150?random=3',
            'biodata' => 'Zalfa Tri adalah Lead Designer kami, yang bertanggung jawab atas estetika visual dan branding Es Telang ZtoA. Dengan sentuhan artistiknya, setiap kemasan dan materi promosi menjadi menarik dan berkesan.'
        ]);

        TeamMember::create([
            'name' => 'M. Adib',
            'role' => 'Lead Developer',
            'photo_url' => 'https://picsum.photos/150/150?random=4',
            'biodata' => 'M. Adib, Lead Developer kami, adalah pengembang utama di balik platform digital kami. Ia memastikan website dan aplikasi kami berfungsi dengan sempurna, memberikan pengalaman terbaik bagi pelanggan.'
        ]);

        TeamMember::create([
            'name' => 'Vresty Pasha',
            'role' => 'Marketing',
            'photo_url' => 'https://picsum.photos/150/150?random=5',
            'biodata' => 'Vresty Pasha adalah ahli pemasaran kami, yang membawa Es Telang ZtoA dikenal luas. Strategi pemasarannya yang kreatif dan efektif membantu kami menjangkau lebih banyak pelanggan dan membangun komunitas yang kuat.'
        ]);
    }
}