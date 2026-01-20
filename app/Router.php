<?php
namespace App;

class Router
{
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        // Remplace {id} par (?P<id>[^/]+)
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $regex = '#^' . $regex . '$#';
        $this->routes['GET'][$regex] = $action;
    }

    public function post(string $path, array $action): void
    {
        // Remplace {id} par (?P<id>[^/]+)
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $regex = '#^' . $regex . '$#';
        $this->routes['POST'][$regex] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        foreach ($this->routes[$method] ?? [] as $regex => $handler) {
            if (preg_match($regex, $path, $matches)) {
                [$controller, $action] = $handler;
                $params = array_filter($matches, fn($key) => !is_int($key), ARRAY_FILTER_USE_KEY);
                $controllerInstance = new $controller();
                // Passage des paramètres à l'action
                $controllerInstance->$action(...$params);
                return;
            }
        }
        http_response_code(404);
        echo "Page non trouvée";
    }
}
