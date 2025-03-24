<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index( $page )
    {
        $customer = new Customer();
        return response()->json([
            'status' => true,
            'customers' => $customer::join('address','address.address_id','customer.address_id')->skip( $page*10 )->take( 10)->get()
            // 'customers' => $customer::all()
        ]);
    }

    public function create(Request $request)
    {
        $customer = new Customer();
        $customer->store_id = $request->store_id;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->address_id = $request->address_id;
        $customer->active = 1;
        $customer->create_date = now();
        $customer->save();
        return response()->json(['customer' => $customer], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->store_id = $request->store_id;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->address_id = $request->address_id;
        $customer->active = 1;
        $customer->create_date = now();
        $customer->save();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->delete();
    }

    public function count()
    {
        $count = Customer::count();
        return response()->json([
            'status' => true,
            'count' => $count
        ]);
    }
}
