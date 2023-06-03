<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(13, 20),
            'nama' => $this->faker->name(),
            'nisn' => $this->faker->numberBetween(1000000000, 9999999999),
            'nis' => $this->faker->numberBetween(1000000000, 9999999999),
            'nik' => $this->faker->numberBetween(1000000000000000, 9999999999999999),
            'no_kk' => $this->faker->numberBetween(100000000000, 999999999999),
            'jenis_kelamin' => $this->faker->randomElement(['l', 'p']),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'no_registrasi_akta_lahir' => $this->faker->numberBetween(1000000000000000, 9999999999999999),
            'agama' => $this->faker->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu']),
            'kewarganegaraan' => $this->faker->randomElement(['wni', 'wna']),
            'kebutuhan_khusus' => $this->faker->randomElement(['tidak', 'netra', 'rungu', 'grahita ringan', 'grahita sedang', 'daksa ringan', 'daksa sedang', 'laras', 'wicara', 'tuna ganda', 'hiper aktif', 'cerdas istimewa', 'bakat istimewa', 'kesulitan belajar', 'narkoba', 'indigo', 'down syndrome', 'autis']),
            'alamat' => $this->faker->address(),
            'rt' => $this->faker->numberBetween(1, 99),
            'rw' => $this->faker->numberBetween(1, 99),
            'dusun' => $this->faker->randomElement(['dusun 1', 'dusun 2', 'dusun 3', 'dusun 4', 'dusun 5']),
            'kelurahan' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kode_pos' => $this->faker->numberBetween(10000, 99999),
            'tempat_tinggal' => $this->faker->randomElement(['ortu', 'kos', 'asrama', 'panti asuhan', 'lainnya']),
            'moda_transportasi' => $this->faker->randomElement(['jalan kaki', 'kendaraan pribadi', 'kendaraan umum', 'jempatan', 'perahu', 'lainnya']),
            'anak_ke' => $this->faker->numberBetween(1, 10),
            'no_kip' => $this->faker->numberBetween(1000000000000000, 9999999999999999),
            'tanggal_masuk_sekolah' => $this->faker->date(),
            'sekolah_asal' => $this->faker->randomElement(['smp 1', 'smp 2', 'smp 3', 'smp 4', 'smp 5']),
            'no_peserta_ujian_nasional' => $this->faker->numberBetween(1000000000000000, 9999999999999999),
        ];
    }
}
