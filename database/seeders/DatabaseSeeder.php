<?php

namespace Database\Seeders;

use App\Models\DataPenugasanPendidik;
use App\Models\EducatorCarrier;
use App\Models\EducatorChildren;
use App\Models\Pendidik;
use App\Models\RiwayatPendidikanFormalPendidik;
use App\Models\RiwayatSertifikatPendidik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        Pendidik::factory(1)->create();
        DataPenugasanPendidik::factory(5)->create();
        RiwayatSertifikatPendidik::factory(5)->create();
        RiwayatPendidikanFormalPendidik::factory(5)->create();
        EducatorChildren::factory(3)->create();
        EducatorCarrier::factory(5)->create();
    }
}
