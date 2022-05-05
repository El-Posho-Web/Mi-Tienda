<?php

namespace Database\Factories;

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
            'nombre' => 'admin',
            'apellido' => 'admin',
            'dni' => '123456789',
            'domicilio' => 'Calle Falsa 123',
            'email' => 'admin@ejemplo.com',
            'password' => '1234', // password
        ];
    }

}
