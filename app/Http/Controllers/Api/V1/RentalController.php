<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RentalRequest;
use App\Http\Resources\Api\V1\RentalResource;
use App\Actions\Books\RentBookAction;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $rentals = $request->user()->rentals()->with('book')->get();
        return RentalResource::collection($rentals);
    }

    public function store(RentalRequest $request, RentBookAction $action)
    {
        $book = Book::findOrFail($request->book_id);

        $rental = $action->execute($request->user(), $book);

        return new RentalResource($rental);
    }
}
