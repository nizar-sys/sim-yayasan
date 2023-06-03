<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducatorChildren>
 */
class EducatorChildrenFactory extends Factory
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
            'nama_anak' => $this->faker->word,
            'status' => $this->faker->word,
            'jenjang' => $this->faker->word,
            'nisn' => $this->faker->word,
            'jenis_kelamin' => $this->faker->randomElement(["l","p"]),
            'tempat_lahir' => $this->faker->word,
            'tanggal_lahir' => $this->faker->date(),
            'tahun_masuk_sekolah' => $this->faker->randomNumber(),
        ];
    }
}
