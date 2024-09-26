<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Setting extends Pivot
{
    protected $table = "setting";
    protected $primary_key = "id";

    protected $fillable = [
                        'image',
                        'mail_host',
                        'mail_username',
                        'mail_password',
                        'mail_enc',
                        'mail_port',
    ];

}
