<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actor = new Actor();
        return response()->json([
            'status' => true,
            'actors' => $actor::orderBy('actor_id', 'desc')->take(25)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $actor = Actor::find($id);
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();
        return response()->json(['actor' => $actor], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $actor = Actor::find($id);
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();
    }

    public function delete(Request $request)
    {
        $id= $request->id;
        $actor = Actor::find($id);
        $actor->delete();

    }
}
