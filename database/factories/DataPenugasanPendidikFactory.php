<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPenugasanPendidik>
 */
class DataPenugasanPendidikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pendidik_id' => 1,
            'nomor_surat_tugas' => $this->faker->word,
            'tanggal_surat_tugas' => $this->faker->date(),
            'tmt_tugas' => $this->faker->word,
            'status_sekolah_induk' => $this->faker->word,
        ];
    }
}
