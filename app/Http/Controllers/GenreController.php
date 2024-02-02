<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequests\StoreGenreRequest;
use App\Http\Requests\GenreRequests\UpdateGenreRequest;
use App\Models\Genre;
use Inertia\Inertia;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();

        return Inertia::render('Genres/Index', [
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Genres/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $validatedData = $request->validated();

        Genre::create($validatedData);

        session()->flash('message', 'Successfully created a new genre');

        return Inertia::location('/genres');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return Inertia::render('Genres/Show', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return Inertia::render('Genres/Edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        // $this->toast('Successfully updated the genre.');
        session()->flash('message', 'Genre updated successfully');

        return Inertia::location('/genres');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        // $this->toast('Successfully deleted the genre.');
        session()->flash('message', 'Genre deleted successfully');

        return Inertia::location('/genres');
    }
}
