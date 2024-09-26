<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Booking extends Pivot
{
    protected $table = "bookings";
    protected $primary_key = "id";

    protected $fillable= [
        'booking_code',
        'customer_id',
        'price',
        'promocode_id',
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
    public function promocode()
    {
    return $this->belongsTo(Promocode::class, 'promocode_id');
    }

    public static function getCustomerByBookingId(){
    return DB::table('booking')
                ->select('booking.id', 'booking.booking_code','customer.first_name','customer.last_name','customer.email','customer.phone_no')
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

}
