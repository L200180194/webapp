<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_admin' => $this->faker->name(),
            'alamat_admin' => $this->faker->address(),
            'tlp_admin' => $this->faker->phoneNumber(),
            'email_admin' => $this->faker->unique()->safeEmail(),
            'password_admin' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
