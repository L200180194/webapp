<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_perusahaan' => $this->faker->company(),
            'alamat_perusahaan' => $this->faker->address(),

            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_perusahaan' => 'verifikasi',
            'tgl_statusperusahaan' => $this->faker->dateTimeThisMonth(),
            'deskripsi_perusahaan' => $this->faker->paragraph(mt_rand(10, 15)),
            'notlp_perusahaan' => $this->faker->phoneNumber(),
            'admin_id' => mt_rand(1, 3),
        ];
    }
}
