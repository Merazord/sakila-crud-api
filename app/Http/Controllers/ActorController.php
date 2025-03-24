<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index( $page )
    {
        $actor = new Actor();
        return response()->json([
            'status' => true,
            'actors' => $actor::skip( $page*10 )->take( 10)->get()
            // 'actors' => $actor::paginate(($page == 0 ? 10 : $page*10))->get()
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
        $id = $request->actor_id;
        $actor = Actor::find($id);
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $actor = Actor::find($id);
        $actor->delete();
    }

    public function count()
    {
        $count = Actor::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
