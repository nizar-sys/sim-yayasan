<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'siswa_id' => 1,
            'prestasi' => $this->faker->word,
            'tingkat' => $this->faker->word,
            'nama_prestasi' => $this->faker->word,
            'tahun' => $this->faker->word,
            'penyelenggara' => $this->faker->word,
            'peringkat' => $this->faker->word,
        ];
    }
}
