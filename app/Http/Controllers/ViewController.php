<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Customer;
use App\Models\City;
use App\Models\Inventory;
use App\Models\Language;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\Staff;
use App\Models\Store;

class ViewController extends Controller
{
    public function categories()
    {
        $category = new Category();
        return response()->json([
            'status' => true,
            'categories' => $category::all()
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

    public function inventories()
    {
        $inventory = new Inventory();
        return response()->json([
            'status' => true,
            'inventories' => $inventory::all()
        ]);
    }

    public function languages()
    {
        $language = new Language();
        return response()->json([
            'status' => true,
            'languages' => $language::all()
        ]);
    }

    public function payments()
    {
        $payment = new Payment();
        return response()->json([
            'status' => true,
            'payments' => $payment::all()
        ]);
    }

    public function rentals()
    {
        $rental = new Rental();
        return response()->json([
            'status' => true,
            'rentals' => $rental::all()
        ]);
    }

    public function staff()
    {
        $staff = new Staff();
        return response()->json([
            'status' => true,
            'staff' => $staff::all()
        ]);
    }

    public function stores()
    {
        $store = new Store();
        return response()->json([
            'status' => true,
            'stores' => $store::all()
        ]);
    }
}
