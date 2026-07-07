<?php

namespace Database\Factories;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\Book;

/**
 * @extends Factory<Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
	$borrowDate = fake()->date();

	$returnDate = fake()->boolean(80) ? fake->dateBetween($borrowDate,'+7 days') : null;

	$status = match (true) {
		$borrowDate && $returnDate => 'kembali',
		$borrowDate => 'dipinjam'
	}

        return [
		'member_id' => Member::inRandomOrder()->first()->id,
		'book_id' => Book::inRandomOrder()->first()->id,
		'borrow_date' => $borrowDate,
		'return_date' => $returnDate,
		'status' => $status
        ];
    }
}
