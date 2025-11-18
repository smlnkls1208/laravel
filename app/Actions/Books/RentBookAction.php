<?php

namespace App\Actions\Books;

use App\Exceptions\BookUnavailableException;
use App\Models\User;
use App\Models\Book;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentBookAction
{
    public function execute(User $user, Book $book): Rental
    {
        return DB::transaction(function () use ($user, $book) {
            if ($book->available_copies <= 0) {
                throw new BookUnavailableException();
            }

            $rental = $user->rentals()->create([
                'book_id' => $book->id,
                'rented_at' => now(),
            ]);

            $book->decrement('available_copies');

            return $rental->load('book');
        });
    }
}
