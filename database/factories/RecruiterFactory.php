<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruiter>
 */
class RecruiterFactory extends Factory
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
            'company_id' => random_int(1,10),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'charge' =>  $this->faker->randomElement(['Gerente','Recruiter']),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'linkedin' => $this->faker->url(),
            'remote' => random_int(0,1),
            'first_interview' => $firstInterview = random_int(1,15),
            'last_interview' => random_int($firstInterview,15),
            'gender' =>  $this->faker->randomElement(['Mujer',''])
            
        ];
    }
}
