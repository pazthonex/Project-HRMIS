<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIHrController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(auth()->user()->tokenCan('hr')){
                return $next($request);
            }else{
                return response()->json([
                    'status' => 403,
                    'message' => 'Access Denied! Not Admin!'
                ],403);
            }
        }else{
            return response()->json([
                'status' => 401,
                'message' => 'Login First!'
            ]);
        }
    }
}
