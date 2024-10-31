<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Promocode;
use Illuminate\Support\Facades\View;

class AllPromoCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $promoList = Promocode::all(); // Fetch the settings
        View::share('promoList', $promoList); // Share settings with all views
        return $next($request);

    }
}
