<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coder>
 */
class CoderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => 1,
            'promo_id' => random_int(1,7),
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'gender' =>  $this->faker->randomElement(['Mujer','Hombre', 'Otros']),
            'years' => random_int(18,60),
            'avaliability' =>  $this->faker->randomElement(['Total','Media Jornada']),
            'remote' => random_int(0,1),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'linkedin' => $this->faker->url(),
            'github' => $this->faker->url(),
            'profile' => 'FullStack'
        ];
    }
}
