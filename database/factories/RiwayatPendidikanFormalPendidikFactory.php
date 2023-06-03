<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatPendidikanFormalPendidik>
 */
class RiwayatPendidikanFormalPendidikFactory extends Factory
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
            'bidang_studi' => $this->faker->word,
            'jenjang_pendidikan' => $this->faker->word,
            'gelar_akademik' => $this->faker->word,
            'satuan_pendidikan' => $this->faker->word,
            'fakultas' => $this->faker->word,
            'kependidikan' => $this->faker->word,
            'tahun_masuk' => $this->faker->randomNumber(),
            'tahun_lulus' => $this->faker->randomNumber(),
            'nis_nim' => $this->faker->randomNumber(),
            'masih_studi' => $this->faker->randomElement(['ya', 'tidak']),
            'semester' => $this->faker->randomNumber(),
            'rata_rata_nilai_ipk' => $this->faker->randomNumber(),
        ];
    }
}
