<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\City;




use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function addresses()
    {
        $address = new Address();
        return response()->json([
            'status' => true,
            'addresses' => $address::all()
        ]);
    }

    public function countries()
    {
        $country = new Country();
        return response()->json([
            'status' => true,
            'countries' => $country::all()
        ]);
    }

    public function cities()
    {
        $city = new City();
        return response()->json([
            'status' => true,
            'cities' => $city::all()
        ]);
    }

    public function customers()
    {
        $customer = new Customer();
        return response()->json([
            'status' => true,
            'customers' => $customer::all()
        ]);
    }

    
}
