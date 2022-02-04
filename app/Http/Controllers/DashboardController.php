<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Package;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $hallSum = DB::table('halls')->count();
        $packageSum = DB::table('packages')->count();
        $bookingSum = DB::table('bookings')->count();
        $date = DB::table('bookings')->pluck('date_booking');
        $userData = Booking::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('date_booking', date('Y'))
                    ->groupBy(DB::raw("Month(date_booking)"))
                    ->pluck('count');
        $locationKL = DB::table('halls')->where('location', 'Kuala Lumpur')->count();
        $locationJB = DB::table('halls')->where('location', 'Johor Bahru')->count();
        $locationP = DB::table('halls')->where('location', 'Perak')->count();
        $locationM = DB::table('halls')->where('location', 'Melaka')->count();
        $role=Auth::user()->role;

        if($role=='1'){
            return view('admin.dashboard', compact('hallSum','packageSum','bookingSum', 'date', 'userData','locationKL','locationJB','locationP','locationM'));   
        }else{
            return view('dashboard');
        }
    }

    



}