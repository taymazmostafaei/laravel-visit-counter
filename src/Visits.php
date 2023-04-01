<?php

namespace Taymaz\Visitcounter;

use Taymaz\Visitcounter\Models\Visit;

class Visits
{

    /**
     * @param routeQuery
     * checking for $routeQuery exsist in database or no
     * @return bool
     */

    public static function exsist($routeQuery)
    {
        return Visit::where('routequery', $routeQuery)->first();
    }


    /**
     * @param routeQuery
     * add new row in data base named $routequery and increment view to 1
     * @return object
     */

    public static function addNewRoute(string $routeQuery)
    {
        $visit = new Visit();

        $visit->routequery = $routeQuery;
        $visit->view = 1;

        return $visit->save();
    }


    /**
     * @param routeQuery
     * add new row in data base named $routequery and increment view to 1
     * @return object
     */

    public static function incrementRoute(string $routeQuery)
    {

        $visit = Visit::where('routequery', $routeQuery)->first();
        $visit->view = $visit->view + 1;
        $visit->save();

        return $visit->view;
    }
}
