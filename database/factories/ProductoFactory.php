<?php

namespace Database\Factories;

use App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->bothify('?###??##'),
            'descripcion' => $this->faker->paragraph(3, true),
            'descripcion_larga' => $this->faker->paragraph(4, true),
            'precio' => $this->faker->randomDigit(9),
        ];
    }
}
