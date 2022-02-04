<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Hall;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;                  //laravel date

class userbookingController extends Controller
{
    public function index($userId){
        $user_Id = $userId;
        $booking =  Booking ::where('user_id', $userId)->where('status' ,'<>', 'pending')->
        orderBy('date_booking', 'desc')->get()->toArray(); 
        $packages = Package:: get()-> toArray();                                                                         //get all packages data from db
        $halls=Hall::get()-> toArray();                                                                                 //get all hall data from db
        
        //check user booking retrieve data from db exist
        if($booking != null){
            //get package and hall name
            // $packageName = Package::select('name')->where('id', '=', $booking->package_id)->first();
            // $hallName = Hall::select('name')->where('id', $booking->hall_id)->first();
        	// $bookingDate = $booking->date_booking;
            // $status = $booking -> status ;
            //change status to complete for booking date < current date
            $todayDate = Carbon::now()->format('Y-m-d'); 
            foreach ($booking as $book){
                $bookingDate = $book['date_booking'];
                if($bookingDate < $todayDate){
                    //query to update db table booking -> where id booking-> update column status "active" to "complete"
                    DB::table('bookings')->where('id', $book['id'])->update(['status' => 'complete']);
                       
                }
            }
            //dd($packages);
           // var_dump($pacakges);
                return view('booking.userbooking', compact('booking','packages','halls'), ['msg' => "Your Booking Information"]);
            }
        return view('booking.userbooking', ['msg' => "No active booking available"]);   
    }

    public function edit(Request $request, $id)
    {
        $booking = Booking::find($id);  //update by id
        $booking->notes = $request->input('notes');
        $booking->update();
        return view('booking.userbooking', ['msg' => "Edit changes has been saved"]);          
    }

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);    //update by id
        $booking->status = "pending";
        $booking->update();

        return view('booking.userbooking', ['msg' => "Please wait for you booking cancelation"]); 
    }

    public static function getPackageNameID($id){
        $packageName = Package::select('name')->where('id', '=', $id)->first() ;
        return $packageName -> name;
    }

    public static function getHallNameID($id){
        $hallName = Hall::select('name')->where('id', '=', $id)->first() ;
        return $hallName ->name ;
    }

}
