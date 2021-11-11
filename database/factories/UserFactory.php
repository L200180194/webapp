<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'foto_user' => $this->faker->imageUrl(640, 480, 'person', true),
            'cv_user' => $this->faker->address(),
            'kota_id' => mt_rand(1, 3),
            'pendidikan_id' => mt_rand(1, 3),
            'prodi_id' => mt_rand(1, 3),
            'skill_id' => mt_rand(1, 10),
            'notlp_user' => $this->faker->phoneNumber(),
            'alamat_user' => $this->faker->address(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
