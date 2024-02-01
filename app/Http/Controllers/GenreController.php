<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequests\StoreGenreRequest;
use App\Http\Requests\GenreRequests\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Inertia\Inertia;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre = Genre::query()
            ->when(request()->filled('search'), fn (Builder $query) => $query->where('name', 'like', '%'.request('search').'%'))
            ->orderBy('name')
            ->paginate(request('per_page', 10))
            ->withQueryString();

        return Inertia::render('Genres/Index', [
            'filters' => request()->all(),
            'genres' => Genre::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $request->validated();

        Genre::create($request);

        $this->toast('Successfully created a new genre');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        $this->toast('Successfully updated the genre.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        $this->toast('Successfully deleted the genre.');

        return back();
    }
}
