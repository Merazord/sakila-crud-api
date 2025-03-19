<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
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
        $address->address_id = 60;
        $address->save();
        return response()->json(['address'=>$address],200);
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $address = Address::find($id);
        $address->address = $request->address;
        $address->address_id = 60;
        $address->save();
    }
    
    public function delete(Request $request)
    {
        $id= $request->id;
        $address = Address::find($id);
        $address->delete();
    }

    public function count() {
        $count = Address::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
