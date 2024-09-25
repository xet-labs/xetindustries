<?php


class  Route {

    // -handle wildcard matching
    public static function match($uri, $routes) {
        // Normalize the URI by removing any trailing slashes, except for the root "/"
        $normalizedUri = rtrim($uri, '/');
        if ($normalizedUri === '') {
            $normalizedUri = '/';
        }

        foreach ($routes as $route => $handler) {
            // Normalize the route
            $normalizedRoute = rtrim($route, '/');
            if ($normalizedRoute === '') {
                $normalizedRoute = '/';
            }

            // Check for exact match between normalized URI and route
            if ($normalizedUri === $normalizedRoute) {
                return $handler;
            }

            // Handle wildcard routes
            if (strpos($route, '*') !== false) {
                $pattern = str_replace('*', '.*', $normalizedRoute);
                if (preg_match('/^' . $pattern . '$/', $normalizedUri)) {
                    return $handler;
                }
            }
        }
        return false;
    }
}