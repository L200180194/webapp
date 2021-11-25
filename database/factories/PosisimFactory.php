<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosisimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_posisi' => $this->faker->jobTitle(),
            'foto_posisi' => $this->faker->imageUrl(640, 480, 'job', true),
            'persyaratan_posisi' => $this->faker->sentence(10),
            'keterangan_posisi' => $this->faker->sentence(10),
            'fasilitas_posisi' => $this->faker->sentence(7),
            'deskripsi_posisi' => $this->faker->sentence(15),
            'deadline_posisi' => $this->faker->dateTimeThisMonth(),
            'perusahaan_id' => mt_rand(1, 10),
        ];
    }
}
