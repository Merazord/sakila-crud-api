<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function most_film_rentals () {
        $query = 
        '
       
SELECT AVG(rental_duration) as quantity_rentals,film.film_id,film.title,rental_id, inventory.inventory_id , film.rating
FROM film
INNER JOIN inventory ON film.film_id=inventory.film_id
INNER JOIN rental ON rental.inventory_id = inventory.inventory_id
group by film.rating


';
        $builder = \DB::table('film')
        ->select(
            // 'film.film_id',
            'film.title',
            // 'rental_id',
            // 'inventory.inventory_id',
            \DB::raw('COUNT(inventory.film_id) quantity_rentals')
        )
        ->join('inventory','film.film_id','inventory.film_id')
        ->join('rental','rental.inventory_id', 'inventory.inventory_id')
        ->groupBy('film.title')
        ->orderBy('quantity_rentals','DESC')
        ->LIMIT(10)
        ->get()
        ;
        // $builder = $builder->fromSub($query);

        return response()->json(['most_rentals' => $builder], 200);

    }

    public function avg_films_rentals_bycategory () {
        $query = 
        '
       
SELECT AVG(rental_duration) as quantity_rentals,film.film_id,film.title,rental_id, inventory.inventory_id , film.rating
FROM film
INNER JOIN inventory ON film.film_id=inventory.film_id
INNER JOIN rental ON rental.inventory_id = inventory.inventory_id
group by film.rating


';
        $builder = \DB::table('film')
        ->select(
            // 'film.film_id',
            'film.title',
            'film.rating',
            // 'rental_id',
            // 'inventory.inventory_id',
            \DB::raw('AVG(film.rental_duration) quantity_rentals')
        )
        ->join('inventory','film.film_id','inventory.film_id')
        ->join('rental','rental.inventory_id', 'inventory.inventory_id')
        ->groupBy('film.rating')
        ->LIMIT(10)
        ->get()
        ;
        // $builder = $builder->fromSub($query);

        return response()->json(['avg_films_rentals_bycategory' => $builder], 200);

    }

    public function actor_appearances () {
        $query = 
        '
       
SELECT count(actor.first_name) as apparitions,actor.actor_id, actor.first_name , film_id FROM sakila.film_actor
join actor on actor.actor_id = film_actor.actor_id
group by actor.actor_id
order by apparitions DESC
LIMIT 10

';

$builder = \DB::table('film_actor')
->select(
    // 'film.film_id',
    'actor.first_name',
    'film_actor.film_id',
    // 'rental_id',
    // 'inventory.inventory_id',
    \DB::raw('count(actor.first_name) as apparitions'),
    \DB::raw('CONCAT(actor.first_name ," ", actor.last_name) as fullname')

)
->join('actor','actor.actor_id','film_actor.actor_id')
->groupBy('actor.actor_id')
->LIMIT(10)
;
        $most  = clone $builder;
        $less  = clone $builder;
        $most = $most->orderBy('apparitions','DESC')->get() ; 
        $less = $less->orderBy('apparitions','ASC') ->get(); 
      
        // $builder = $builder->fromSub($query);

        return response()->json(['most_apparitions' => $most , 'less_apparitions'=> $less], 200);

    }

    

    //
}
