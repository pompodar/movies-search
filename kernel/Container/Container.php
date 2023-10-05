<?php
namespace App\Kernel\Container;

use App\Kernel\HTTP\Request\Request;
use App\Kernel\Router\Router;

class Container {
    public Request $request;
    
    public Router $router;
    
    public function __construct() {
        $this->registerServices();
    }
    
    public function registerServices(): void {
        $this->request = Request::createFromGlobals();
        $this->router = new Router();
    }
}