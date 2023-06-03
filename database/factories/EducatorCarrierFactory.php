<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducatorCarrier>
 */
class EducatorCarrierFactory extends Factory
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
            'jenjang_pendidikan' => $this->faker->word,
            'jenis_lembaga' => $this->faker->word,
            'status_kepegawaian' => $this->faker->word,
            'jenis_ptk' => $this->faker->word,
            'lembaga_pengangkat' => $this->faker->word,
            'no_sk_kerja' => $this->faker->word,
            'tgl_sk_kerja' => $this->faker->date(),
            'tmt_kerja' => $this->faker->word,
            'tst_kerja' => $this->faker->word,
            'tempat_kerja' => $this->faker->word,
            'mapel_diajarkan' => $this->faker->word,
        ];
    }
}
