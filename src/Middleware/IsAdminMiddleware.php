<?php

namespace Umark\Ticketit\Middleware;

use Closure;
use Umark\Ticketit\Models\Agent;
use Umark\Ticketit\Models\Setting;

class IsAdminMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Agent::isAdmin()) {
            return $next($request);
        }

        return redirect()->route(Setting::grab('main_route') . '.index')
            ->with('warning', trans('ticketit::lang.you-are-not-permitted-to-access'));
    }
}
