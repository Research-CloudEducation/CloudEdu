<?php

namespace Database\Factories;

use App\Models\ClassLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classLevel = ClassLevel::all();
            # code...
            return [
                // try to create fake data into category table 
                'name' => json_encode([
                    'ar' => fake()->name(),
                    'en' => fake()->name(),
                ]),
                'description' => json_encode([
                    'ar' => fake()->sentence(),
                    'en' => fake()->sentence(),
                ]),
                'class_id'  => 1
            ];
    }
}
