<?php

namespace Taymaz\Visitcounter\Middleware;

use Closure;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Taymaz\Visitcounter\RouteQuery;
use Taymaz\Visitcounter\Visits;

class VisitCount
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
        if (!isset($request->route()->getAction()['as'])) {
            throw new InvalidArgumentException('route name not found. give name() to your route');
        }
        $routeName = $request->route()->getAction()['as'];
        $params = $request->route()->parameters();

        $routeQuery = RouteQuery::make($routeName, $params);

        if (!Visits::exsist($routeQuery)) {

            Visits::addNewRoute($routeQuery);
            $request->merge(['views' => 1]);

            return $next($request);
        }

        
        $views = Visits::incrementRoute($routeQuery);
        $request->merge(['views' => $views]);

        return $next($request);
    }
}
