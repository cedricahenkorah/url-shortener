<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            // Explode the route URI and URL to compare each segment
            $routeSegments = explode('/', $route['uri']);
            $urlSegments = explode('/', $url);

            // Check if the number of segments match
            if (count($routeSegments) === count($urlSegments) && $route['method'] === strtoupper($method)) {
                $parameters = [];

                // Check if each segment matches or is a dynamic parameter
                $matched = true;
                for ($i = 0; $i < count($routeSegments); $i++) {
                    if ($routeSegments[$i] !== $urlSegments[$i] && strpos($routeSegments[$i], '{') !== false && strpos($routeSegments[$i], '}') !== false) {
                        // This is a dynamic parameter
                        $parameterName = trim($routeSegments[$i], '{}');
                        $parameters[$parameterName] = $urlSegments[$i];
                    } elseif ($routeSegments[$i] !== $urlSegments[$i]) {
                        // If the segments don't match and it's not a dynamic parameter
                        $matched = false;
                        break;
                    }
                }

                if ($matched) {
                    // If the route matches, pass parameters to the controller
                    $controllerPath = base_path('Http/controllers/' . $route['controller']);
                    $controller = require $controllerPath;
                    return $controller($parameters);
                }
            }
        }
    }
}
