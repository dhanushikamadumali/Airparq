<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcoountPasswordResetToken extends Model
{
    use HasFactory;

    protected $table = "account_password_reset";
    protected $primary_key = "email";

    protected $fillable =[
        'email',
        'token',
        'created_at'
    ];
}
