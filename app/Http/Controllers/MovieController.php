<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Movie;

class MovieController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    public function list(Request $request)
    {
        $request->validate(['page' => 'numeric', 'search' => 'string|max:50']);
        $page = $request->page ? $request->page : 0;
        $search = $request->search;

        $total_movies = Movie::where('user_id', $this->user->id)->where('name', 'like', '%' . $search . '%')->count();

        if ($page == 0) {
            $movies = Movie::where('user_id', $this->user->id)->where('name', 'like', '%' . $search . '%')->get();
            $pages = 1;
        } else {
            $page_ = ($page - 1) * 3;
            $movies = Movie::where('user_id', $this->user->id)->where('name', 'like', '%' . $search . '%')
                            ->skip($page_)->take(3)->get();
            $pages = ceil(($total_movies / 3));
        }

        return response()->json([
            'success' => true, 
            'total_movies' => $total_movies, 
            'total_pages' => $pages, 
            'movie' => $movies
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:50', 'description' => 'required|string|max:255', 'year' => 'required|numeric']);

        $new_movie = $this->user->movie()->create( $request->all());

        return response()->json([
            'success' => true, 
            'movie' => $new_movie
        ], 201);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate(['name' => 'required|string|max:50', 'description' => 'required|string|max:255', 'year' => 'required|numeric']);

        if ($this->user->movie->find($movie)) {
            $movie->update($request->all());
            return response()->json($movie, 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found'
            ], 500);
        }
    }

    public function delete($movie)
    {
        if ($movie_ = $this->user->movie->find($movie)) {
            if ($movie_->delete()) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie can\'t be deleted'
                ], 204);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found'
            ], 500);
        }
    }
}
