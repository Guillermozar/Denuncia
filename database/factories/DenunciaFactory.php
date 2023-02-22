<?php

namespace Database\Factories;

use App\Models\Denuncia;
use Illuminate\Database\Eloquent\Factories\Factory;

class DenunciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Denuncia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->word,
        'observacion' => $this->faker->text,
        'descripcion' => $this->faker->text,
        'long' => $this->faker->text,
        'lat' => $this->faker->text,
        'imagen' => $this->faker->text,
        'estado' => $this->faker->text,
        'tipo' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
