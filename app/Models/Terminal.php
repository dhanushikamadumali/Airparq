<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Terminal extends Pivot
{
    protected $table = "terminals";
    protected $primary_key = "id";

    protected $fillable= [
        'name',
        'image',
        'base_price',
        'per_day_price',
        'description',
        'status'


    ];
}
