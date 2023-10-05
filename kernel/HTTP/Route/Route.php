<?php
namespace App\Kernel\HTTP\Route;

class Route {
    private string $uri;
    private string $method;
    private $action;
    
    public function __construct($uri, $method, $action) {
        $this->uri = $uri;
        $this->method = $method;
        $this->action = $action;
    } 

    public static function get(string $uri, $action) {
        return new static($uri, 'GET', $action); 
    }

    public static function post(string $uri, $action) {
        return new static($uri, 'POST', $action); 
    }

    public function getMethod(): string {
        return $this->method; 
    }

    public function getUri(): string {
        return $this->uri; 
    }

    public function getAction() {
        return $this->action; 
    }

    

}