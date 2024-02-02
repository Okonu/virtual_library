<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequests\StoreAuthorRequest;
use App\Http\Requests\GenreRequests\UpdateGenreRequest;
use App\Models\Author;
use Inertia\Inertia;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('genre')->get();

        return Inertia::render('Authors/Index', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Authors/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $validatedData = $request->validated();

        Author::create($validatedData);

        session()->flash('message', 'Successfully created a new author');

        return Inertia::location('/authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('genre');

        return Inertia::render('Authors/Show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $author->load('genre');

        return Inertia::render('Authors/Edit', ['author' =>$author]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Author $author)
    {
        $author->update($request->validated());

        session()->flash('message', 'Author has been updated');

        return Inertia::location('/authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        session()->flash('message', 'Author deleted successfully');

        return Inertia::location('/authors');
    }
}
