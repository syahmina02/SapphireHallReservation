<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Hall;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;  

class adminbookingController extends Controller
{
    public function index (){

        //$user_id = $userId;
        $adminBooking = Booking::all()->toArray(); //get all user booking data list 
        //$adminBooking = DB::table('bookings')->get()->toArray(); //get all user booking data list 

        $packages = Package::all();                                             //get all packages data from db
        $halls=Hall::all();                                                     //get all hall data from db
       
        /*//array declaration
        $packageName = [];      //declare package name array
        $hallName = [];         //declare hall name array
        $bookingDate = [];
        $Notes = [];
        $bookingTime = [];
        $bookStatus = [];
       
        //loop get data package id and hall id based on user booking data
        foreach($adminBooking as $ab){
            $packageName[] = Package::select('name')->where('id', '=', $ab->package_id)->first();
            $hallName[] = Hall::select('name')->where('id', $ab->hall_id)->first();
            $bookingDate[] = $ab->date_booking;
            $bookingTime[] =$ab->time;
            $Notes[] = $ab->notes;
            $bookStatus[] =$ab->status;
        }

        $testData = array();
        //loop array
        foreach($adminBooking as $ab){
            $i = 0;
            array_push($testData,[
                'package_name' => $packageName[$i]->name,
                'hall_name' => $hallName[$i]->name,
                'booking_date' => $bookingDate[$i],
                'time' => $bookingTime[$i],
                'notes' => $Notes[$i],
                'status' => $bookStatus[$i]
            ]);
            $i++;
        }
        return view('booking.adminbooking', compact('testData')); //bole
        */
         //test
        //dd($adminBooking);
        //Log::info($adminBooking); // will show in your log
        //var_dump($adminBooking);
        return view('booking.adminbooking', compact('adminBooking'));

    }

    public function search(Request $request)
    {
        $date_booking = Carbon::parse($request->date_booking)->format('Y-m-d');
        $adminBooking = Booking::whereDate('date_booking','=',$date_booking)
        ->get();
        return view('booking.adminbooking', compact('adminBooking'));
    }
    public function delete($id)
    {
        $booking = Booking::findOrFail($id); //delete by id
        $booking->delete();
        return redirect ()->back();
    }
}
