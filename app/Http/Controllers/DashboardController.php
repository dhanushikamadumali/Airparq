<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Setting;
use App\Http\Middleware\CompanySettings;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(CompanySettings::class);
    }

    public function index()
    {
        $today = Carbon::today()->toDateString();
        $month = Carbon::now()->month;
        $monthcharacter = Carbon::now()->format('F');
        $startOfMonth = Carbon::now()->startOfMonth();
        $year = Carbon::now()->year;
        $todayincomebooking = Booking::todaybookingcount($today); //today income booking count
        $currentyearmonth = Booking::currentmonthbookingcount($month, $year); //current month booking count
        $todayoutgoingbooking = Booking::todayoutgoingbookingcount($today); //today outgoing booking count
        $todayrevenue = Booking::todayrevenue($today); //today revenue
        $todayallrevenue =  number_format($todayrevenue->todayallrevenue, 2, '.', ',');
        $monthtodaterevenue = Booking::monthtodaterevenue($today, $startOfMonth); //month to date revenue
        $monthtodateallrevenue =  number_format($monthtodaterevenue->monthtodatellrevenue, 2, '.', ',');
        $currentmonthrepeatecustomer = Booking::currentmonthrepeatecustomer($startOfMonth, $today); //current month repeate customer

        return view('dashboard.index', compact('todayincomebooking', 'currentyearmonth', 'todayoutgoingbooking', 'todayallrevenue', 'monthtodateallrevenue', 'monthcharacter','currentmonthrepeatecustomer'));
    }

    // get month to date booking count
    public function getmontlybooking()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $today = Carbon::today()->toDateString();

        $bookings = Booking::monthlybookings($startOfMonth,$today);
        $labels = [];  // Format data for the chart
        $data = [];
        foreach ($bookings as $booking) {

            $labels[] = $booking['date'];  // Adding months to labels array
            $data[] = $booking['count'];    // Adding counts to data array
        }
        return response()->json([ // Return the response as JSON
            'labels' => $labels,
            'data' => $data
        ]);
    }

     // get today income  booking count
     public function gettodayincomebooking()
     {
         $today = Carbon::today()->toDateString();
         $bookings = Booking::todayincomebookings($today);
         $labels = [];  // Format data for the chart
         $data = [];
         foreach ($bookings as $booking) {

             $labels[] = $booking['date'];  // Adding months to labels array
             $data[] = $booking['count'];    // Adding counts to data array
         }
         return response()->json([ // Return the response as JSON
             'labels' => $labels,
             'data' => $data
         ]);
     }

    // get month to date booking revenue
    public function getcurrentmonthrevenue()
    {
        $today = Carbon::today()->toDateString();
        $startOfMonth = Carbon::now()->startOfMonth();
        $bookings = Booking::monthtodatebookingrevenue($startOfMonth,$today);
        $labels = [];  // Format data for the chart
        $data = [];
        foreach ($bookings as $booking) {

            $labels[] = $booking['date'];  // Adding months to labels array
            $data[] = $booking['monthtodatellrevenue'];    // Adding counts to data array
        }
        return response()->json([ // Return the response as JSON
            'labels' => $labels,
            'data' => $data
        ]);
    }

     // get today revenue
     public function gettodayincomerevenue()
     {
         $today = Carbon::today()->toDateString();
         $bookings = Booking::todayincomerevenue($today);
         $labels = [];  // Format data for the chart
         $data = [];
         foreach ($bookings as $booking) {

             $labels[] = $booking['date'];  // Adding months to labels array
             $data[] = $booking['todayrevenue'];    // Adding counts to data array
         }
         return response()->json([ // Return the response as JSON
             'labels' => $labels,
             'data' => $data
         ]);
     }
}
