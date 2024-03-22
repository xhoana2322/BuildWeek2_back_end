<?php

namespace Database\Factories;

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
        static $categories = ['Horror', 'Fantasy', 'Fiction', 'Romance', 'Mystery', 'History', 'Science', 'Art', 'Poetry', 'Dystopia'];
        return [
            'CategoryName' => array_shift($categories),
        ];
    }
}
