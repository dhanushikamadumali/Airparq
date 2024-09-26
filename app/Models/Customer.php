<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Customer extends Pivot
{
    protected $table= "customer";
    protected $primarykey = "id";

    protected $fillable =
             [
                'first_name',
                'last_name',
                'email',
                'phone_no',
             ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
