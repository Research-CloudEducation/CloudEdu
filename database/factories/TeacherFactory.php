<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // try to create fake data of teacher 
            'name' => json_encode([
                'ar' => fake()->name(),
                'en' => fake()->name()
            ]),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ?? Hash::make('password'), // 
            'profile' => fake()->imageUrl(640 , 480),
            'address' => fake()->streetAddress(),
            'phone' => fake()->phoneNumber(),
            'school_id' => 3,
        ];
    }
}
