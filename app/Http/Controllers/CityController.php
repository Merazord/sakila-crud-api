<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = new City();
        return response()->json([
            'status' => true,
            'cities' => $city::orderBy('city_id', 'desc')->take(25)->get()
        ]);
    }

    public function create(Request $request)
    {
        $city = new City();
        $city->city = $request->city;
        $city->country_id = 60;
        $city->save();
        return response()->json(['city'=>$city],200);
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $city = City::find($id);
        $city->city = $request->city;
        $city->country_id = 60;
        $city->save();
    }
    
    public function delete(Request $request)
    {
        $id= $request->id;
        $city = City::find($id);
        $city->delete();
    }

    public function count() {
        $count = City::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
