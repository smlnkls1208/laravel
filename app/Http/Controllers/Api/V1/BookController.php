<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\BookRequest;
use App\Http\Resources\Api\V1\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

    public function index()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
