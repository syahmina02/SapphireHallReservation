<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\Package;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;                  //laravel date
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index($id){
        $booking = Booking::all();
        $packages = Package::all();
        $halls=Hall::findOrFail($id);
        $todayDate = Carbon::now()->format('Y-m-d');
        return view('booking.booking', compact('halls','packages'),['today' =>$todayDate]);
    }

    public function store(Request $request, $id)
    {
        $userid=Auth::user()->id;                                       //get current user id
        $todayDate = Carbon::now()->format('Y-m-d');                    //current date
        $bookDate = Carbon::parse($request->date_booking)->format('Y-m-d');   //user request booking date

        if($bookDate < $todayDate){
            return redirect()->back()->with('alert','Booking date is invalid!');
        }
        elseif(Booking::where('user_id', $userid)->doesntExist() 
                ||(Booking::where('user_id', $userid)->where('status', '=', "active")->doesntExist()
                && Booking::where('user_id', $userid)->where('status', '=', "pending")->doesntExist()
        )){
            $booked=Booking::where('date_booking','=', $request->date_booking)-> 
            where('package_id', '=',$request->package_id)->
            where('hall_id','=', $id)->first();
        }
        else{
            return redirect()->back()->with('alert','Sorry you have active book!');
        }
        
        
        if($booked!=null) {
           
            return redirect()->back()->with('alert','Sorry the date already full booked!');
           
        }
        else
        {
            $status = "active";
            $booking = new Booking([
                "date_booking" =>$request->date_booking,
                "time" =>$request->time,
                "theme" =>$request->theme,
                "notes" =>$request->notes,
                "sessions" =>$request->sessions,
                "package_id" =>$request->package_id,
                "user_id" =>$userid,
                "hall_id" =>$id, 
                "status" =>$status,    
            ]);
            
            $booking->save();
            
            
            $user = DB::table('users')->where('id', $booking->user_id)->first();
            $package = DB::table('packages')->where('id', $booking->package_id)->first();
            $hall = DB::table('halls')->where('id', $booking->hall_id)->first();
            
            $tax = (($package->price + $hall->price)*0.06);
            $totalp = ($package->price + $hall->price + $tax);
            
            $booking->totalPrice = $totalp;
            $booking->save();

            return view('booking.checkout', [
                'booking'=> $booking,
                'usern' => $user->name,
                'usere' => $user->email,
                'hall' => $hall->name,
                'hallprice' => $hall->price,
                'package' => $package->name,
                'packageprice' => $package->price,
                'tax' => $tax,
            ]);
            
        }
    }

    public function checkout ($id){
        $booking = Booking::find($id);
        $user = DB::table('users')->where('id', $booking->user_id)->first();
        $package = DB::table('packages')->where('id', $booking->package_id)->first();
        $hall = DB::table('halls')->where('id', $booking->hall_id)->first();
        
        $tax = (($package->price + $hall->price)*0.06);
        $totalp = ($package->price + $hall->price + $tax);
        
        $booking->totalPrice = $totalp;
        $booking->save();

        return view('booking.checkout', [
            'booking'=> $booking,
            'usern' => $user->name,
            'usere' => $user->email,
            'hall' => $hall->name,
            'hallprice' => $hall->price,
            'package' => $package->name,
            'packageprice' => $package->price,
            'tax' => $tax,
        ]);
    }
}

