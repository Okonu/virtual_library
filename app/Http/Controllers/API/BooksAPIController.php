<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksAPIController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'author.genre'])->get();
        return response()->json(['message' => 'All books fetched successfully', 'data' => $books], 200);
    }

    public function show($id)
    {
        return response()->json(['message' => 'Book fetched successfully', 'data' => Book::with('author')->findOrFail($id)], 200);
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json(['message' => 'Book created successfully', 'data' => $book], 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json(['message' => 'Book updated successfully', 'data' => $book], 200);
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
