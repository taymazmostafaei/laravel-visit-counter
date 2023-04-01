<?php

namespace Taymaz\Visitcounter;

use App\Models\Visit;

class RouteQuery
{
    /**
     * @param routeName,params
     * create routequery like blog.post.3
     * @return string
     */

    public static function make(string $routeName, array $params)
    {
        array_unshift($params, $routeName); //add route name to params array
        $query = implode('.', $params);

        return $query;
    }
}
