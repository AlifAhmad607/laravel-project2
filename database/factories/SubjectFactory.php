<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Mobile Development',
                'Web Development',
                'Desktop App Development',
                'Informatika',
                'Bahasa Jawa',
                'Olahraga',
                'Seni Budaya',            
            ]),
            'description' => $this->faker->sentence(6,true),
        ];
    }
}
