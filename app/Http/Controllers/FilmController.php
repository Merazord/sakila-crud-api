<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index( $page )
    {


        $film = new Film();
        return response()->json([
            'status' => true,
            'films' => $film::skip( $page*10 )->take( 10)->get()

            //'films' => $film::all()
        ]);
    }

    public function create(Request $request)
    {
        $film = new Film();
        $film->title = $request->title;
        $film->description = $request->description;
        $film->release_year = $request->release_year;
        $film->length = $request->length;
        $film->language_id = 1;
        $film->save();
        return response()->json(['film' => $film], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->film_id;
        $film = Film::find($id);
        $film->title = $request->title;
        $film->description = $request->description;
        $film->release_year = $request->release_year;
        $film->length = $request->length;
        $film->language_id = 1;
        $film->save();
    }

    public function delete(Request $request)
    {
        $id= $request->id;
        $film = Film::find($id);
        $film->delete();
    }

    public function count() {
        $count = Film::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
