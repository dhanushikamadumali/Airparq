<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Booking;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use App\Http\Middleware\CompanySettings;

class ReportController extends Controller
{

    public function __construct(){
        $this->middleware(CompanySettings::class);
    }

    /**
     * Display a listing of the resource.
     */
    // Get today's date
    public function todayreport()
    {
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $todaybookinglists =Booking::todaybookingreport($today);
        return view('report.todayreport',compact('todaybookinglists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // current month report
    public function currentmonthreport()
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $currentmonthbookinglists = Booking::currentmonthbookingreport($month,$year);
        return view('report.currentmonthreport',compact('currentmonthbookinglists'));
    }
     /**
     * Display a listing of the resource.
     */
    // Get today's pdf
    public function todaypdf()
    {
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $todaybookinglists = Booking::todaybookingreport($today);
        $data = [
            'date' => $today,
            'bookings' => $todaybookinglists,
        ];
        $pdf = PDF::loadView('report.alltodayreportpdf', $data);
        return $pdf->download('todaybookinglists.pdf');

    }
     /**
     * Display a listing of the resource.
     */
    // Get current month pdf
    public function currentmonthpdf()
    {
        $month = Carbon::now()->month;
        $monthcharacter = Carbon::now()->format('F');
        $year = Carbon::now()->year;
        $currentmonthbookinglists = Booking::currentmonthbookingreport($month, $year);
        $data = [
            'year' =>  $year,
            'month' => $monthcharacter,
            'bookings' =>  $currentmonthbookinglists,
        ];
        $pdf = PDF::loadView('report.allcurrentmonthreportpdf', $data);
        return $pdf->download('currentmonthbookinglists.pdf');

    }

    public function printbookingdetails(Booking $booking,$id){

        $id = Crypt::decryptString($id);
        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('booking.print',compact('bookingdetails'));
    }

}
