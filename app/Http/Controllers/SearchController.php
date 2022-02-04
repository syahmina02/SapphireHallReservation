<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Hall;
use App\Models\Package;
use DB;

class SearchController extends Controller{

    public function index(Request $request){
        $locations = DB::table('halls')->select('location')->distinct()->get()->pluck('location');
        $prices = DB::table('halls')->select('price')->distinct()->get()->pluck('price');
        $id = DB::table('halls')->select('package_id')->distinct()->get()->pluck('package_id');
        $name = DB::table('packages')->select('name')->distinct()->get()->pluck('name');
        //$date_booking = DB::table('bookings')->select('date_booking')->distinct()->get()->pluck('date_booking');
        //$hall_id = DB::table('bookings')->select('hall_id')->distinct()->get()->pluck('hall_id');
        $date = DB::table('bookings')->select('date_booking')->distinct()->get()->pluck('date_booking');
        $halls_id = DB::table('halls')->select('id')->distinct()->get()->pluck('id');
        

        $post = Hall::query();
        $post2 = Package::query();
        $post3 = Booking::query();
        
        if($request->filled('price')){
            $post->where('price', $request->price);
        }
        if($request->filled('location')){
            $locat=$request->get('location');
            $post->where('location', 'LIKE', '%'. $locat . '%')->get();
        }
        if($request->filled('package_id')){
            $post->where('package_id', $request->package_id);
        }
        if($request->filled('name')){
            $post2->where('name', $request->name);
        }
        if($request->filled('date_booking')){
            $post3->where('date_booking', $request->date_booking)->value('hall_id');
            $halls_id->where('id', $post3);

        }
        //echo $post3->date_booking;

        return view('halls.search', [
            'prices'=> $prices,
            'locations' => $locations,
            'id' => $id,
            'name' => $name,
            'halls_id' => $halls_id,
            'posts' => $post->get(),
            'posts2' => $post2->get(),
            'posts3' => $post3->get()
        ]);
    }

    public function store(Request $request){
        return $request->all();
        return view('halls.search');
    }
}