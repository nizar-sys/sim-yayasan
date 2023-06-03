<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendidik>
 */
class PendidikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'nama' => $this->faker->name,
            'nik_paspor' => $this->faker->unique()->numerify('################'),
            'jenis_kelamin' => $this->faker->randomElement(['l', 'p']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'nama_ibu_kandung' => $this->faker->name,
        ];
    }
}
