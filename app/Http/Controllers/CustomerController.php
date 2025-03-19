<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = new Customer();
        return response()->json([
            'status' => true,
            'customers' => $customer::all()
        ]);
    }

    public function create(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->timestamps = false;
        $customer->save();
        return response()->json(['customer' => $customer], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->save();
    }
    
    public function delete(Request $request)
    {
        $id= $request->id;
        $customer = Customer::find($id);
        $customer->delete();
    }

    public function count() {
        $count = Customer::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
