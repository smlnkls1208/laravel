<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RentalRequest;
use App\Http\Resources\Api\V1\RentalResource;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $rentals = $request->user()->rentals()->with('book')->get();
        return RentalResource::collection($rentals);
    }

    public function store(RentalRequest $request)
    {
        $book = Book::findOrFail($request->book_id);

        if (!$book->isAvailable()) {
            return response()->json([
                'message' => 'Книга недоступна для аренды'
            ], 400);
        }

        $rental = $request->user()->rentals()->create([
            'book_id' => $book->id,
            'rented_at' => now(),
        ]);

        $book->decrement('available_copies');

        $rental->load('book');


        return new RentalResource($rental);
    }


}
