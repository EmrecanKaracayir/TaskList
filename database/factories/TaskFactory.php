<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => fake()->sentence,
      'description' => fake()->paragraph,
      'long_description' => fake()->paragraph(7),
      'completed' => fake()->boolean,
    ];
  }

  public function without_long_description(): self
  {
    return $this->state(fn() => ['long_description' => null]);
  }
}
