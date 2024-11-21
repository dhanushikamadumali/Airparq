<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Terminal extends Pivot
{
    protected $table = "terminals";
    protected $primary_key = "id";

    protected $fillable = [
        'name',
        'image',
        'base_price',
        'per_day_price',
        'description',
        'status'
    ];
    public static function getterminaldetails($terminalid)
    {

        return DB::table('terminals')
            ->where('id', '=', $terminalid)
            ->get();
    }
    //all terminal list
    public static function getAllTerminalDetails($request)
    {
        $allterminal = Terminal::when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        });
        return $allterminal;
    }
}
