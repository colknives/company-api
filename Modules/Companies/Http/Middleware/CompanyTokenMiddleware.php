<?php

namespace Modules\Companies\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Companies\Helper\CompanyTokenHelper;

class CompanyTokenMiddleware
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
        
        $validate = CompanyTokenHelper::validateToken($request);

        if( $validate->status != 200 ){
            return response()->json([
                "message" => $validate->message
            ], $validate->status);
        }

        return $next($request);
    }
}
