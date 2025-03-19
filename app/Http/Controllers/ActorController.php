<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actor = new Actor();
        return response()->json([
            'status' => true,
            'actors' => $actor::all()
        ]);
    }

    public function create(Request $request)
    {
        $actor = new Actor();
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();
        return response()->json(['actor' => $actor], 200);
    }

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

    public function count() {
        $count = Actor::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
