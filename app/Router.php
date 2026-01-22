<?php

namespace App;

class Router
{

    /**
     * @var array<string, array<string, array{0: class-string, 1: string}>>
     */
    private array $routes = [];
    /**
     * @param string $path
     * @param array{0: class-string, 1: string} $action
     */
    public function get(string $path, array $action): void
    {
        // Remplace {id} par (?P<id>[^/]+)
        $regex = (string)preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $regex = '#^' . $regex . '$#';
        $this->routes['GET'][$regex] = $action;
    }

    /**
     * @param string $path
     * @param array{0: class-string, 1: string} $action
     */
    public function post(string $path, array $action): void
    {
        // Remplace {id} par (?P<id>[^/]+)
        $regex = (string)preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $regex = '#^' . $regex . '$#';
        $this->routes['POST'][$regex] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        foreach ($this->routes[$method] ?? [] as $regex => $handler) {
            if (preg_match((string)$regex, (string)$path, $matches)) {
                [$controller, $action] = $handler;
                $params = array_filter($matches, fn($key) => ! is_int($key), ARRAY_FILTER_USE_KEY);
                $controllerInstance = new $controller();
                $controllerInstance->$action(...$params);
                return;
            }
        }
        http_response_code(404);
        view('error/404', ['title' => 'Not found!']);
    }
}
