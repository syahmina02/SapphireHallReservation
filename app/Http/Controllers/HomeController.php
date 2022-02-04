<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hall;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $role=Auth::user()->role;

        $data = [
            'name' => Auth:: user()->name,
            'userId' => Auth:: user()->id,
        ];

        $hallSum = DB::table('halls')->count();
        $packageSum = DB::table('packages')->count();
        $bookingSum = DB::table('bookings')->count();
        $date = DB::table('bookings')->pluck('date_booking');
        $userData = Booking::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('date_booking', date('Y'))
                    ->groupBy(DB::raw("Month(date_booking)"))
                    ->pluck('count');
        $locationKL = DB::table('halls')->where('location', 'Kuala Lumpur')->count();
        $locationJB = DB::table('halls')->where('location', 'Johor')->count();
        $locationP = DB::table('halls')->where('location', 'Perak')->count();
        $locationM = DB::table('halls')->where('location', 'Melaka')->count();

        if($role=='1'){
            return view('admin.dashboard', compact('hallSum','packageSum','bookingSum', 'date', 'userData','locationKL','locationJB','locationP','locationM'));   
        }else{
            return view('dashboard', $data);
        }
    }

    public function gallery(){
        $slider = Image::query();
        $packages = Package::all();
        return view('home', ['slider' => $slider->get()], compact('packages'));
    }
}
