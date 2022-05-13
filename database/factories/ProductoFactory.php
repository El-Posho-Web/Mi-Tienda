<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{

    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'stock' => $this->faker->numberBetween($min = 1, $max = 10),
            'precio_unitario' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000),
            'id_categoria' => $this->faker->numberBetween($min = 1, $max = 4)
        ];
    }
}
