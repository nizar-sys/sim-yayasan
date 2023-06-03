<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatSertifikatPendidik>
 */
class RiwayatSertifikatPendidikFactory extends Factory
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
            'jenis_sertifikasi' => $this->faker->word,
            'nomor_sertifikasi' => $this->faker->randomNumber(),
            'tahun_sertifikasi' => $this->faker->randomNumber(),
            'bidang_studi' => $this->faker->word,
            'nomor_peserta' => $this->faker->randomNumber(),
        ];
    }
}
