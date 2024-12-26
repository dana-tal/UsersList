<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CorsMiddleware
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
        $response = $next($request);

        // Set the CORS headers manually
        $response->headers->set('Access-Control-Allow-Origin', '*'); // or specify a domain
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS'); // Allowed methods
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization'); // Allowed headers
        $response->headers->set('Access-Control-Allow-Credentials', 'true'); // If you need credentials (cookies, authorization headers)
        $response->headers->set('Access-Control-Max-Age', '3600'); // Cache preflight response for 1 hour

        // Handle preflight requests
        if ($request->getMethod() == "OPTIONS") {
            return response()->json([], 200); // Respond with 200 for OPTIONS requests
        }

        return $response;
    }
}
