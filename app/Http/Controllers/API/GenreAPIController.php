<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreAPIController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'All genres fetched successfully', 'data' => Genre::all()], 200);
    }

    public function getBooksByGenre($genreId)
    {
        $genre = Genre::findOrFail($genreId);
        $books = $genre->books;
        return response()->json(['message' => 'Books fetched successfully', 'data' => $books], 200);
    }

    public function show($id)
    {
        return response()->json(['message' => 'Specific genre fetched successfully', 'data' => Genre::findOrFail($id)], 200);
    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return response()->json(['message' => 'New genre created successfully', 'data' => $genre], 201);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());
        return response()->json(['message' => 'Existing genre updated successfully', 'data' => $genre], 200);
    }

    public function delete($id)
    {
        Genre::findOrFail($id)->delete();
        return response()->json(['message' => 'Genre deleted successfully'], 200);
    }
}
