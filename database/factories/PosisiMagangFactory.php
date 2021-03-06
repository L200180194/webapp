<?php

namespace Database\Factories;

use App\Models\posisi_magang;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosisiMagangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = posisi_magang::class;
    public function definition()
    {
        return [
            'nama_posisi' => $this->faker->jobTitle(),
            'foto_posisi' => $this->faker->imageUrl(640, 480, 'job', true),
            'persyaratan_posisi' => $this->faker->sentences(10),
            'keterangan_posisi' => $this->faker->sentences(10),
            'fasilitas_posisi' => $this->faker->sentences(7),
            'deskripsi_posisi' => $this->faker->sentences(15),
            'deadline_posisi' => $this->faker->dateTimeThisMonth(),
            'perusahaan_id' => mt_rand(1, 10),
        ];
    }
}
