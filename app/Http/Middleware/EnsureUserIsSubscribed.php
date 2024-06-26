<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $subscription = $request?->user()?->subscriptions?->first();
        // $subscriptionType = $subscription?->type;
        if ($request->user() && ! $request->user()->subscribed() && ! $request->user()->is_admin) {
            // This user is not a paying customer...
            // return redirect('/');
            return redirect('subscribe')->with('notice', __('You must be a paying member to access the portal.'));
        }

        return $next($request);
    }
}
