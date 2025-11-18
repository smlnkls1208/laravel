<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadingListController extends Controller
{
    public function index(Request $request)
    {
        $books = $request->user()->readingList;
        return \App\Http\Resources\Api\V1\BookResource::collection($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => ['required', 'exists:books,id'],
        ]);

        $book = Book::findOrFail($request->book_id);

        $request->user()->readingList()->attach($book);

        return response()->json([
            'message' => 'Книга добавлена в список для чтения'
        ], 201);
    }

    public function destroy(Request $request, Book $book)
    {
        $request->user()->readingList()->detach($book);

        return response()->noContent();
    }
}
