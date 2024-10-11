<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Setting extends Pivot
{
    protected $table = "setting";
    protected $primary_key = "id";

    protected $fillable = [
                        'image',
                        'smtp_host',
                        'username',
                        'password',
                        'enc_type',
                        'port',
                        'email',
                        'phone1',
                        'phone2',
                        'address',


    ];

}
