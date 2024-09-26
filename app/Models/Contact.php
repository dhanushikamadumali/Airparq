<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Contact extends Pivot
{
    protected $table = "contact";
    protected $primary_key ="id";
    protected $fillable =[
        'name',
        'email',
        'comment',
    ];
}
