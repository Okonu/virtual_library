<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequests\StoreAuthorRequest;
use App\Http\Requests\GenreRequests\UpdateGenreRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StoreAuthorRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Author $author)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
    }
}
