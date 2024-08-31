<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassLevel>
 */
class ClassLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                // here to set class level  factory 
                'name' => json_encode([
                    'ar' => fake()->name(),
                    'en' => fake()->name()
                ]),
                'description' => json_encode([
                    'ar' => fake()->sentence(),
                    'en' => fake()->sentence()
                ]),
                
        ];
    }
}
