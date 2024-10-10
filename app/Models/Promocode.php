<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Promocode extends Pivot
{
    protected $table= "promocodes";
    protected $primarykey = "id";

    protected $fillable =
             [
                'promo_code',
                'discount_amount',
                'discount_type',
             ];
   
    public static function getpromodetails($promocode){

        return DB::table('promocodes')
                ->where('promo_code', 'like', "%{$promocode}%")
                ->get();

    }

}
