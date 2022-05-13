<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName('male'|'female'),
            'apellido' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numberBetween($min = 1000000, $max = 99999999),
            'domicilio' => $this->faker->streetAddress(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '1234', // password
        ];
    }

}
