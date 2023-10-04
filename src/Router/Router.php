<?php
namespace App\Router;

class Router {
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct() {
        $this->initRoutes();
    }
    
    public function dispatch(string $uri, $method): void {
        $route = $this->findRoute($uri, $method);

        if(!$route) {
            $this->notFound();
        }     
        
        if(is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller();

            // No explanation why we need to use this function
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    } 

    private function notFound(): void {
        echo '404 | not found';
        exit;
    }
    
    private function findRoute(string $uri, string $method) {
        if(!isset($this->routes[$method][$uri])) {
            return false;
        }
        
        return $this->routes[$method][$uri];
    }

    public function initRoutes() {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    public function getRoutes(): array {
        return require_once APP_PATH . '/config/routes.php';
    }
}