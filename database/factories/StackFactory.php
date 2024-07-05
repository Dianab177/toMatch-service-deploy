<?php

namespace Database\Factories;

use App\Models\Stack;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsStack>
 */
class StackFactory extends Factory
{
  use RefreshDatabase;
  protected $model = Stack::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
     return[
      //'name' => $this->faker->name,
     ];
    }
  }