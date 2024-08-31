<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // create array with default int number 
        $class_id = [1,2,3];
        $school_id = [1,2,3,4,5,6,7,8];
        foreach ($school_id as $key => $value1) {
            # code...
            foreach ($class_id as $key => $value) {
                # insert each loop with single number 
                return [
                    // try to create fake data if student 
                    'name' => json_encode([
                        'ar' => fake()->name(),
                        'en' => fake()->name()
                    ]),
                    'email' => fake()->unique()->safeEmail(),
                    'password' => static::$password ?? Hash::make('password'), // 
                    'profile' => fake()->imageUrl(640 , 480),
                    'address' => fake()->streetAddress(),
                    'phone' => fake()->phoneNumber(),
                    'school_id' => $value1,
                    'class_id' => $value,
                ];
            }
        }
    }
}
