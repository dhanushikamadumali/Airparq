<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

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
}
