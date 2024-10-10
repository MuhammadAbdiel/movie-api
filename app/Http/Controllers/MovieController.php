<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->query('mode') && $request->query('mode') == 'simple') {
            $movies = Movie::latest()->get();
            return $this->sendResponse(MovieResource::collection($movies), 'Movies retrieved successfully.', 200);
        }

        $movies = Movie::latest()->paginate(8);

        $pagination = [
            'total' => $movies->total(),
            'per_page' => $movies->perPage(),
            'current_page' => $movies->currentPage(),
            'last_page' => $movies->lastPage(),
            'first_page_url' => $movies->url(1),
            'last_page_url' => $movies->url($movies->lastPage()),
            'next_page_url' => $movies->nextPageUrl(),
            'prev_page_url' => $movies->previousPageUrl()
        ];

        return $this->sendResponse(MovieResource::collection($movies), 'Movies retrieved successfully.', 200, true, $pagination);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request): JsonResponse
    {
        $image = $request->file('poster');
        $fileName = $image->hashName();
        Storage::disk('public')->putFileAs('movies', $image, $fileName);
        $imageUrl = Storage::url('movies/' . $fileName);

        $movie = Movie::create(array_merge($request->validated(), ['poster' => env('APP_URL') . $imageUrl]));

        return $this->sendResponse(new MovieResource($movie), 'Movie created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie): JsonResponse
    {
        return $this->sendResponse(new MovieResource($movie), 'Movie retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie): JsonResponse
    {
        if ($request->hasFile('poster')) {
            if ($movie->poster) {
                $filePath = explode(env('APP_URL'), $movie->poster);
                $fileStorage = str_replace('/storage', '', $filePath[1]);
                Storage::disk('public')->delete($fileStorage);
            }

            $image = $request->file('poster');
            $fileName = $image->hashName();
            Storage::disk('public')->putFileAs('movies', $image, $fileName);
            $imageUrl = Storage::url('movies/' . $fileName);
            $movie->update(array_merge($request->validated(), ['poster' => env('APP_URL') . $imageUrl]));
        } else {
            $movie->update($request->validated());
        }

        return $this->sendResponse(new MovieResource($movie), 'Movie updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie): JsonResponse
    {
        if ($movie->poster) {
            $filePath = explode(env('APP_URL'), $movie->poster);
            $fileStorage = str_replace('/storage', '', $filePath[1]);
            Storage::disk('public')->delete($fileStorage);
        }

        $movie->delete();

        return $this->sendResponse([], 'Movie deleted successfully.', 200);
    }
}
