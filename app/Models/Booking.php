<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Booking extends Pivot
{
    protected $table = "booking";
    protected $primary_key = "id";

    protected $fillable= [
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
        'parking_from_time',
        'parking_till_date',
        'parking_till_time',
        'outbound_terminal',
        'inbound_terminal',
        'inbound_flight_number',
        'outbound_flight_number',
        'flight_arrival_time',
        'flight_arrival_date',
        'flight_departure_time',
        'flight_departure_date',
        'airport',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public static function getCustomerByBookingId(){
    return DB::table('booking')
                ->select('booking.id', 'booking.booking_code','booking.status','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                ->join('customer', 'booking.customer_id', '=', 'customer.id')
                ->orderByDesc('booking.id')
                ->get();
    }

    public static  function getfilterdatedetails($from_date,$to_date)
    {
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer', 'booking.customer_id', '=', 'customer.id')
                    ->whereDate('parking_from_date', '>=', $from_date)
                    ->whereDate('parking_till_date', '<=', $to_date)
                    ->orderByDesc('booking.id')
                    ->get();
    }

    public static  function getfilterincomebooking($today,$terminal)
    {
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','booking.parking_from_time','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer', 'booking.customer_id', '=', 'customer.id')
                    ->where('inbound_terminal','=',$terminal)
                    ->where('parking_from_date', '=', $today)
                    ->orderByDesc('booking.id')
                    ->get();
    }

    public static  function getfilteroutgoingbooking($today,$terminal)
    {
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','booking.parking_till_time','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer', 'booking.customer_id', '=', 'customer.id')
                    ->where('inbound_terminal','=',$terminal)
                    ->where('parking_till_date', '=', $today)
                    ->orderByDesc('booking.id')
                    ->get();
    }

    public static function bookingdetailsbyid($id){
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer', 'booking.customer_id', '=', 'customer.id')
                    ->where('booking.id', '=',$id)
                    ->orderByDesc('booking.id')
                    ->get();
    }

    public static function todaybookingreport($today){
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','booking.parking_from_time','booking.parking_till_date','booking.parking_till_time','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer','booking.customer_id', '=', 'customer.id')
                    ->where('parking_from_date','=',$today)
                    ->orderByDesc('booking.id')
                    ->get();
    }
    public static function currentmonthbookingreport($month,$year){
        return DB::table('booking')
                    ->select('booking.id', 'booking.booking_code','booking.parking_from_time','booking.parking_till_date','booking.parking_till_time','customer.first_name','customer.last_name','customer.email','customer.phone_no')
                    ->join('customer','booking.customer_id', '=', 'customer.id')
                    ->whereMonth('booking.parking_from_date','=',$month)
                    ->whereYear('booking.parking_from_date','=',$year)
                    ->orderByDesc('booking.id')
                    ->get();
    }

    // current month year booking count

    public static function currentmonthbookingcount($month,$year){
        return DB::table('booking')
                    ->whereMonth('parking_from_date','=',$month)
                    ->whereYear('parking_from_date','=',$year)
                    ->count();
    }

    // today booking count
    public static function todaybookingcount($date){
        return DB::table('booking')
                    ->whereDate('parking_from_date','=',$date)
                    ->count();
    }

    // monthly booking count
    public static function monthlybookings(){
        return DB::table('booking')
                ->select(DB::raw('MONTHNAME(parking_from_date) as month'), DB::raw('COUNT(*) as count'))
                ->groupBy(DB::raw('MONTHNAME(parking_from_date)'))
                ->get()
                ->toArray();
    }

    public static function editbookingdetailsbyid($id){
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

    public static function updatestatus($id){
        return DB::table('booking')
                    ->where('id',$id)
                    ->update(['status' => 0]);
    }

}
