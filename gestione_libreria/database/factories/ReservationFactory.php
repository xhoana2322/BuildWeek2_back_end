<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['Available', 'Not available', 'Pending'];
        return [
            'status' => fake()->randomElement($status),
            'user_id' => User::get()->random()->id,
            'book_id' => Book::get()->random()->id,
        ];
    }
}
