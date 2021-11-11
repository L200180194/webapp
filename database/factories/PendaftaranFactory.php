<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl_daftar' => $this->faker->date(),
            'tgl_perubahanstatus' => $this->faker->dateTimeThisMonth(),
            'keterangan_daftar' => $this->faker->paragraph(2),
            'status_daftar' => $this->faker->randomElement(['Diterima', 'Ditolak', 'Proses']),
            'user_id' => mt_rand(1, 3),
            'posisi_magang_id' => mt_rand(1, 10),
            'perusahaan_id' => mt_rand(1, 10),
        ];
    }
}
