<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    protected $model = Articulo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Descripcion' => $this->faker->sentence(),
            'Marca' => $this->faker->randomElement(["Rolland", "Alter Ego", "UNA"]),
            'Existencia' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
