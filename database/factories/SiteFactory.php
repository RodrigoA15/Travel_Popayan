<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'municipio' => $this->faker->state(),
            'lugar' =>$this->faker->streetAddress(),
            'nombre' => $this->faker->streetName(),
            'fotografia' => $this->faker->imageUrl(),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
