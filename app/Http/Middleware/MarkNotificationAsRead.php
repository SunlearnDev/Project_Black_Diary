<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('read')) {
            $notification = $request->user()->notifications()->where('id', $request->read)->first();
            if ($notification) {
                $notification->markAsRead();
            }
        }
        return $next($request);
    }
}
