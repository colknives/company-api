<?php

namespace Modules\Departments\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Departments\Helper\DepartmentTokenHelper;

class DepartmentTokenMiddleware
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
        
        $validate = DepartmentTokenHelper::validateToken($request);

        if( $validate->status != 200 ){
            return response()->json([
                "message" => $validate->message
            ], $validate->status);
        }

        return $next($request);
    }
}
