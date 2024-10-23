<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Bookingprice extends Pivot
{
    protected $table = "bookingprice";
    protected $primary_key = "id";

    protected $fillable= [
        'datecount',
        'booking_price',
    ];
    public static function getbookingcount($datecount){

        return DB::table('bookingprice')
                ->where('datecount', 'like', $datecount)
                ->get();

    }

}
