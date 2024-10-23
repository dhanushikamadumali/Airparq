<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class CompanySettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $csetting = Setting::select('image', 'address', 'phone1', 'phone2', 'email')->first(); // Fetch the settings
        View::share('csetting', $csetting); // Share settings with all views
        return $next($request);
    }
}
