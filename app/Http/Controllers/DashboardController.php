<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Setting;
use App\Http\Middleware\CompanySettings;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }

    public function index(){

        $today = Carbon::today()->toDateString();
        $month = Carbon::now()->month;
        $monthcharacter = Carbon::now()->format('F');
        $year = Carbon::now()->year;
        $todaybooking = Booking::todaybookingcount($today);
        $currentyearmonth = Booking::currentmonthbookingcount($month,$year);

        return view('dashboard.index', compact('todaybooking','currentyearmonth','monthcharacter'));
    }

    public function getmontlybooking(){
        $monthlybookings =Booking::monthlybookings();
        $labels = [];  // Format data for the chart
        $data = [];
        foreach ($monthlybookings as $booking) {
            $labels[] = $booking->month;  // Adding months to labels array
            $data[] = $booking->count;    // Adding counts to data array
        }
        return response()->json([ // Return the response as JSON
            'labels' => $labels,
            'data' => $data
        ]);
    }

}
