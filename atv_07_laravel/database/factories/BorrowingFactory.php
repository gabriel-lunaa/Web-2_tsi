<?php

namespace Database\Factories;

use App\Models\Borrowing;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Borrowing::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::inRandomOrder()->first()->id,
            'borrowed_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'returned_at' => fake()->optional()
                                  ->dateTimeBetween('now', '+1 month'),
        ];
    }
}
