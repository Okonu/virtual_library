<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequests\StoreAuthorRequest;
use App\Http\Requests\AuthorRequests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsAPIController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return response()->json(['author' => $author, 'books' => $author->books ?? null], 200);
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());
        return response()->json(['message' => 'New author created successfully', 'data' => $author], 201);
    }

    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->validated());
        return response()->json(['message' => 'Existing author updated successfully', 'data' => $author], 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted Successfully'], 200);
    }
}
