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

     // Get today's  outgoing report
     public function todayoutgoingreport()
     {
         $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
         $todayoutgoingbookinglists =Booking::todayoutgoingbookingreport($today);
         return view('report.todayoutgoingreport',compact('todayoutgoingbookinglists'));
     }

    /**
     * Show the form for creating a new resource.
     */
    // current month report
    public function currentmonthreport()
    {

        $startOfMonth = Carbon::now()->startOfMonth();
        $today = Carbon::today()->toDateString();
        $currentmonthbookinglists = Booking::currentmonthbookingreport($startOfMonth,$today);
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
    // Get today's outgoing pdf
    public function todayoutgoingpdf()
    {
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $todayoutgoingbookinglists = Booking::todayoutgoingbookingreport($today);
        $data = [
            'date' => $today,
            'bookings' =>  $todayoutgoingbookinglists,
        ];
        $pdf = PDF::loadView('report.alltodayoutgoingreportpdf', $data);
        return $pdf->download('todayoutgoingbookinglists.pdf');

    }
     /**
     * Display a listing of the resource.
     */
    // Get current month pdf
    public function currentmonthpdf()
    {
        // $month = Carbon::now()->month;
        $monthcharacter = Carbon::now()->format('F');
        $startOfMonth = Carbon::now()->startOfMonth();
        $today = Carbon::today()->toDateString();
        $year = Carbon::now()->year;
        $currentmonthbookinglists = Booking::currentmonthbookingreport($startOfMonth, $today);
        $data = [
            'year' =>  $year,
            'month' => $monthcharacter,
            'bookings' =>  $currentmonthbookinglists,
        ];
        $pdf = PDF::loadView('report.allcurrentmonthreportpdf', $data);
        return $pdf->download('currentmonthbookinglists.pdf');

    }
    public function todayprintbookingdetails(Booking $booking,$id){

        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('report.todayprint',compact('bookingdetails'));
    }
    public function currentmonthprintbookingdetails(Booking $booking,$id){

        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('report.currentmonthprint',compact('bookingdetails'));
    }
    // Get today's  revenue report
    public function todayrevenuereport()
    {
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $todaybookinglists =Booking::todaybookingreport($today);
        $todayrevenue =Booking::todayrevenue($today);
        $todayallrevenue =  number_format($todayrevenue->todayallrevenue, 2, '.', ',');
        return view('report.todayrevenuereport',compact('todayallrevenue','todaybookinglists'));
    }
    // today revenue report
    public function todayrevenuepdf()
    {
        $today = Carbon::today()->toDateString();
        $todaybookinglists =Booking::todaybookingreport($today);
        $todayrevenue =Booking::todayrevenue($today);
        $todayallrevenue =  number_format($todayrevenue->todayallrevenue, 2, '.', ',');
        $data = [
            'date' =>$today,
            'bookings' =>  $todaybookinglists,
            'allrevenue' => $todayallrevenue
        ];
        $pdf = PDF::loadView('report.todayrevenuereportpdf', $data);
        return $pdf->download('todayrevenue.pdf');

    }

    // Get month to date report
    public function monthtodaterevenuereport()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $today = Carbon::today()->toDateString();
        $year = Carbon::now()->year;
        $currentmonthbookinglists = Booking::currentmonthbookingreport($startOfMonth, $today);
        $monthtodaterevenue = Booking::monthtodaterevenue($today, $startOfMonth); //month to date revenue
        $monthtodateallrevenue =  number_format($monthtodaterevenue->monthtodatellrevenue, 2, '.', ',');
        return view('report.monthtodaterevenuereport',compact('monthtodateallrevenue','currentmonthbookinglists'));
    }
    // month to date revenue report
    public function monthtodaterevenuepdf()
    {
        $monthcharacter = Carbon::now()->format('F');
        $startOfMonth = Carbon::now()->startOfMonth();
        $today = Carbon::today()->toDateString();
        $year = Carbon::now()->year;
        $currentmonthbookinglists = Booking::currentmonthbookingreport($startOfMonth, $today);
        $monthtodaterevenue = Booking::monthtodaterevenue($today, $startOfMonth); //month to date revenue
        $monthtodateallrevenue =  number_format($monthtodaterevenue->monthtodatellrevenue, 2, '.', ',');
        $data = [
            'month' => $monthcharacter,
            'year' =>  $year,
            'bookings' =>  $currentmonthbookinglists,
            'allrevenue' => $monthtodateallrevenue
        ];
        $pdf = PDF::loadView('report.monthtodaterevenuereportpdf', $data);
        return $pdf->download('monthtodaterevenue.pdf');
    }


     // Get year report
     public function yearrevenuereport()
     {
         $year = Carbon::now()->year;
         $yearbookinglists = Booking::yearbookingreport($year);
         $yearrevenue = Booking::yearrevenue($year); //month to date revenue
         $yearallrevenue =  number_format($yearrevenue->yearallrevenue, 2, '.', ',');
         return view('report.yearrevenuereport',compact('yearallrevenue','yearbookinglists'));
     }
     // year revenue report
     public function yearrevenuepdf()
     {
         $year = Carbon::now()->year;
         $yearbookinglists = Booking::yearbookingreport($year);
         $yearrevenue = Booking::yearrevenue($year); //month to date revenue
         $yearallrevenue =  number_format($yearrevenue->yearallrevenue, 2, '.', ',');
         $data = [
             'year' =>  $year,
             'bookings' =>  $yearbookinglists,
             'allrevenue' => $yearallrevenue
         ];
         $pdf = PDF::loadView('report.yearrevenuereportpdf', $data);
         return $pdf->download('yearrevenue.pdf');
     }

}
