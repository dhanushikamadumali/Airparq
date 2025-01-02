<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Booking extends Pivot
{
    protected $table = "booking";

    protected $fillable = [
        'booking_code',
        'customer_id',
        'price',
        'promocode',
        'vehicle_reg',
        'vehicle_manufacturer',
        'vehicle_model',
        'vehicle_color',
        'image',
        'parking_from_date',
        'parking_till_date',
        'outbound_terminal',
        'inbound_terminal',
        'inbound_flight_number',
        'outbound_flight_number',
        'flight_arrival_time',
        'flight_arrival_date',
        'flight_departure_time',
        'flight_departure_date',
        'parking_from_hour',
        'parking_from_min',
        'parking_till_hour',
        'parking_till_min',
        'airport',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    //all booking details
    public static function getCustomerByBookingId($request)
    {
        $allbooking = Booking::with('customer:id,first_name,email,phone_no')
        ->when($request->search, function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('booking_code', 'LIKE', '%' . $request->search . '%')
                      ->orWhereHas('customer', function ($query) use ($request) {
                          $query->where('first_name', 'LIKE', '%' . $request->search . '%');
                      });
            });
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->orderBy('created_at', 'desc') // Sorts results by the latest booking
       ;

    return $allbooking;


    }
    public static  function getfilterstatusetails($status)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code','customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('status', '=', $status)
            ->orderByDesc('booking.id')
            ->get();
    }
    public static  function getfilterdatedetails($from_date, $to_date)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code','booking.status', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->whereDate('parking_from_date', '>=', $from_date)
            ->whereDate('parking_till_date', '<=', $to_date)
            ->orderByDesc('booking.id')
            ->get();
    }

    public static  function getfilterincomebooking($today, $terminal)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('inbound_terminal', '=', $terminal)
            ->where('parking_from_date', '=', $today)
            ->orderByDesc('booking.id')
            ->get();
    }

    public static  function getfilteroutgoingbooking($today, $terminal)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_till_time', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('inbound_terminal', '=', $terminal)
            ->where('parking_till_date', '=', $today)
            ->orderByDesc('booking.id')
            ->get();
    }

    // get filte today regidterd booking
    public static  function getfiltertodayregisterdbooking($today)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time','booking.status','customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->whereDate('booking.created_at', '=', $today)
            ->orderByDesc('booking.created_at')
            ->get();
    }

    public static function bookingdetailsbyid($id)
    {
        return DB::table('booking')
            ->select('booking.*', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('booking.id', '=', $id)
            ->orderByDesc('booking.id')
            ->get();
    }

    public static function todaybookingreport($today)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time', 'booking.parking_till_date', 'booking.parking_till_time', 'booking.price','customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('parking_from_date', '=', $today)
            ->orderByDesc('booking.id')
            ->get();
    }


    public static function todayoutgoingbookingreport($today)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time', 'booking.parking_till_date', 'booking.parking_till_time', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->where('parking_till_date', '=', $today)
            ->orderByDesc('booking.id')
            ->get();
    }

    public static function currentmonthbookingreport($startOfMonth, $today)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time', 'booking.parking_till_date', 'booking.parking_till_time','booking.price', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->whereBetween('booking.parking_from_date', [$startOfMonth, $today])
            ->orderByDesc('booking.id')
            ->get();
    }

    public static function yearbookingreport($year)
    {
        return DB::table('booking')
            ->select('booking.id', 'booking.booking_code', 'booking.parking_from_time', 'booking.parking_till_date', 'booking.parking_till_time','booking.price', 'customer.first_name', 'customer.last_name', 'customer.email', 'customer.phone_no')
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->whereYear('booking.parking_from_date', '=',$year)
            ->orderByDesc('booking.id')
            ->get();
    }

    // current month year booking count
    public static function currentmonthbookingcount($month, $year)
    {
        return Booking::whereMonth('parking_from_date', '=', $month)->whereYear('parking_from_date', '=', $year)->count();
    }
    // today incomming booking count
    public static function todaybookingcount($date)
    {
        return Booking::whereDate('parking_from_date', '=', $date)->count();
    }
    // today outgoing booking count
    public static function todayoutgoingbookingcount($date)
    {
        return Booking::whereDate('parking_till_date', '=', $date)->count();
    }
    // current month repeate customer
    public static function currentmonthrepeatecustomer($startOfMonth,$today)
    {
        return Booking::whereBetween('parking_from_date', [$startOfMonth, $today])
                        ->selectRaw('COUNT(*) as total_count')
                        ->groupByRaw('DAY(parking_from_date), customer_id')
                        ->get();

    }
    // today revenue
    public static function todayrevenue($date)
    {
        return Booking::selectRaw('sum(price) as todayallrevenue')->whereDate('parking_from_date', '=', $date)->first();
    }
    // month to date revenue
     public static function monthtodaterevenue($date,$startOfMonth)
     {
         return Booking::selectRaw('sum(price) as monthtodatellrevenue')->whereBetween('parking_from_date',[$startOfMonth,$date])->first();
     }
      // year revenue
      public static function yearrevenue($year)
      {
          return Booking::selectRaw('sum(price) as yearallrevenue')->whereYear('parking_from_date','=', $year)->first();
      }
    // month to date booking count
    public static function monthlybookings($startOfMonth,$today)
    {
        return Booking::whereBetween('parking_from_date', [$startOfMonth, $today])
                        ->selectRaw('DAY(parking_from_date) as date, COUNT(*) as count')
                        ->groupByRaw('DAY(parking_from_date)')
                        ->orderBy('date', 'asc')
                        ->get()
                        ->toArray();
    }

    // today income booking count
    public static function todayincomebookings($today)
    {
        return Booking::whereDate('parking_from_date', $today)
                        ->selectRaw('DAYNAME(parking_from_date) as date, COUNT(*) as count')
                        ->groupByRaw('DAYNAME(parking_from_date)')
                        ->get()
                        ->toArray();
    }

    // month to date booking revenue
      public static function monthtodatebookingrevenue($startOfMonth,$today)
      {
         return Booking::whereBetween('parking_from_date',[$startOfMonth,$today])
                         ->selectRaw('DAY(parking_from_date) as date, sum(price) as monthtodatellrevenue')
                         ->groupByRaw('DAY(parking_from_date)')
                         ->get()
                         ->toArray();
      }

    // today revenue
    public static function todayincomerevenue($today)
    {
       return Booking::whereDate('parking_from_date',$today)
                       ->selectRaw('DAYNAME(parking_from_date) as date, sum(price) as todayrevenue')
                       ->groupByRaw('DAYNAME(parking_from_date)')
                       ->get()
                       ->toArray();
    }

    public static function editbookingdetailsbyid($id)
    {
        return DB::table('booking')
            ->select(
                'booking.*',
                'customer.first_name',
                'customer.last_name',
                'customer.email',
                'customer.phone_no',
                'customer.id as customer_id',
                'inbound_terminal.name as inbound_terminal_name',
                'outbound_terminal.name as outbound_terminal_name'
            )
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->join('terminals as inbound_terminal', 'booking.inbound_terminal', '=', 'inbound_terminal.id')
            ->join('terminals as outbound_terminal', 'booking.outbound_terminal', '=', 'outbound_terminal.id')
            ->where('booking.id', '=', $id)
            ->orderByDesc('booking.id')
            ->get();
    }

    public static function updatestatus($id)
    {
        return DB::table('booking')
            ->where('id', $id)
            ->update(['status' => 0]);
    }


    public static function showbookingdetailsbyid($id)
    {
        return DB::table('booking')
            ->select(
                'booking.*',
                'customer.first_name',
                'customer.last_name',
                'customer.email',
                'customer.phone_no',
                'customer.id as customer_id',
                'inbound_terminal.name as inbound_terminal_name',
                'outbound_terminal.name as outbound_terminal_name'
            )
            ->join('customer', 'booking.customer_id', '=', 'customer.id')
            ->join('terminals as inbound_terminal', 'booking.inbound_terminal', '=', 'inbound_terminal.id')
            ->join('terminals as outbound_terminal', 'booking.outbound_terminal', '=', 'outbound_terminal.id')
            ->where('booking.id', '=', $id)
            ->orderByDesc('booking.id')
            ->get();
    }
}
