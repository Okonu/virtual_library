<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequests\StoreBookRequest;
use App\Http\Requests\BookRequests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->get();

        return Inertia::render('Books/Index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();

        return Inertia::render('Books/Create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validated();

        Book::create($validatedData);

        session()->flash('success', 'Book created successfully');

        return Inertia::location('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('author');

        return Inertia::render('Books/Show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book->load('author');

        $authors = Author::all();

        return Inertia::render('Books/Edit', ['book' => $book, 'authors' => $authors]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        session()->flash('success', 'Book updated successfully');

        return Inertia::location('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        session()->flash('success', 'Book deleted successfully');

        return Inertia::location('/books');
    }
}
