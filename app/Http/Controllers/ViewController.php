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
    public function categories( $page )
    {
        $category = new Category();
        return response()->json([
            'status' => true,
            'categories' => $category::skip( $page*10 )->take( 10)->get()
            // 'categories' => $category::all()
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

    public function select_cities()
    {
        $city = new City();
        return response()->json([
            'status' => true,
            'cities' => $city::all()
        ]);
    }

    public function cities( $page )
    {
        $city = new City();
        return response()->json([
            'status' => true,
            'cities' => $city::join('country','country.country_id','city.country_id')->skip( $page*10 )->take( 10)->get()

            // 'cities' => $city::all()
        ]);
    }

    public function film_actor( $page )
    {
        $film_actor = \DB::table('film_actor')->select(
            \DB::raw('CONCAT(actor.first_name ," ", actor.last_name) as fullname_actor'),
            'film_actor.*','film.*'
            )
        ->join('actor','actor.actor_id','film_actor.actor_id')
        ->join('film','film_actor.film_id','film.film_id');
        return response()->json([
            'status' => true,
            'film_actor' => $film_actor->skip( $page*10 )->take( 10)->get()

            // 'cities' => $city::all()
        ]);
    }

    public function film_category( $page )
    {
        $film_category = \DB::table('film_category')->select(
            'film_category.*','film.*','category.*'
            )
            ->join('film','film_category.film_id','film.film_id')
            ->join('category','film_category.category_id','category.category_id');
            return response()->json([
            'status' => true,
            'film_category' => $film_category->skip( $page*10 )->take( 10)->get()

            // 'cities' => $city::all()
        ]);
    }


    public function film_text( $page )
    {
        $film_text = \DB::table('film_text')->select('film_text.*' );
            return response()->json([
            'status' => true,
            'film_text' => $film_text->skip( $page*10 )->take( 10)->get()

            // 'cities' => $city::all()
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

    public function inventories( $page )
    {

        
        $inventory = \DB::table('inventory')->select(
            'inventory.*','film.*'
            )
            ->join('film','inventory.film_id','film.film_id');
        return response()->json([
            'status' => true,
            'inventories' => $inventory->skip( $page*10 )->take( 10)->get()
            // 'inventories' => $inventory::all()
        ]);
    }

    public function select_languages(){
        $language = new Language();
        return response()->json([
            'status' => true,
            'languages' => $language::all()
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

    public function payments( $page )
    {


        $payments = \DB::table('payment')->select(
            'payment.*','customer.*','rental.*',
            \DB::raw('CONCAT(staff.first_name ," ", staff.last_name) as fullname_staff'),
            \DB::raw('CONCAT(customer.first_name ," ", customer.last_name) as fullname_customer'),
            )
            ->join('customer','payment.customer_id','customer.customer_id')
            ->join('staff','payment.staff_id','staff.staff_id')
            ->join('rental','payment.rental_id','rental.rental_id');
   

        // $payment = new Payment();
        return response()->json([
            'status' => true,
            'payments' => $payments->skip( $page*10 )->take( 10)->get()

            // 'payments' => $payment::all()
        ]);
    }

    public function rentals( $page )
    {
        $rental = \DB::table('rental')->select('rental.*',
            \DB::raw('CONCAT(staff.first_name ," ", staff.last_name) as fullname_staff'),
            \DB::raw('CONCAT(customer.first_name ," ", customer.last_name) as fullname_customer'),
            )
            ->join('customer','rental.customer_id','customer.customer_id')
            ->join('staff','rental.staff_id','staff.staff_id');
   

        return response()->json([
            'status' => true,
            'rentals' => $rental->skip( $page*10 )->take( 10)->get()
        ]);
    }

    public function staff( $page )
    {


        $staff = \DB::table('staff')->select(
        \DB::raw('CONCAT(staff.first_name ," ", staff.last_name) as fullname_staff'),
        'staff.staff_id','staff.address_id','staff.email','staff.store_id',
        'staff.active','staff.username','address.address'
        )
        ->join('address','staff.address_id','address.address_id');


    return response()->json([
        'status' => true,
        'staff' => $staff->skip( $page*10 )->take( 10)->get()
    ]);


      
    }

    public function stores(){
        

         $store = new Store();
        return response()->json([
            'status' => true,
            'stores' => $store::all()
        ]);

    }
    public function select_tores( $page )
    {


        $store = \DB::table('store')->select(
            \DB::raw('CONCAT(staff.first_name ," ", staff.last_name) as fullname_staff'),
            'store.*',
            'address.address'
            )
            ->join('address','store.address_id','address.address_id')
            ->join('staff','staff.staff_id','store.manager_staff_id');
    
    
        return response()->json([
            'status' => true,
            'store' => $store->skip( $page*10 )->take( 10)->get()
        ]);

        // $store = new Store();
        // return response()->json([
        //     'status' => true,
        //     'stores' => $store::all()
        // ]);
    }
}
