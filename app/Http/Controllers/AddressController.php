<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index( $page )
    {

        $address = new Address();
        return response()->json([
            'status' => true,
            'addresses' => $address::join('city','city.city_id','address.city_id')->skip( $page*10 )->take( 10)->get()
            // 'addresses' => $address::all()
        ]);
    }

    
    public function select_display () {
        $address = new Address();
        return response()->json([
            'status' => true,
            'addresses' => $address::all()
        ]);
    }
    public function create(Request $request)
    {
        $address = new Address();
        $address->address = $request->address;
        $address->address2 = $request->address2 ?? null;
        $address->district = $request->district;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();
        return response()->json(['address' => $address], 200);
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $address = Address::find($id);
        $address->address = $request->address;
        $address->address2 = $request->address2 ?? null;
        $address->district = $request->district;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $address = Address::find($id);
        $address->delete();
    }

    public function count()
    {
        $count = Address::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
