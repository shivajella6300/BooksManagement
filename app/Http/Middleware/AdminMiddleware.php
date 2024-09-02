<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Attempt to authenticate the user using the token
            $user = JWTAuth::parseToken()->authenticate();
            // Debugging output: Log or dump user details
            if ($user) {
                \Log::info('Authenticated user:', ['id' => $user->id, 'role' => $user->role]);
            } else {
                \Log::info('User not authenticated');
            }
            // Check if the user is an admin
            if ($user && $user->role === 'admin') {
                return $next($request);
            }
            return response()->json(['error' => 'Unauthorized'], 403);
        } catch (\Exception $e) {
            \Log::error('Token error: ' . $e->getMessage());
            return response()->json(['error' => 'Token error: ' . $e->getMessage()], 401);
        }
    }
    
}
