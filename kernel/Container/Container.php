<?php
namespace App\Kernel\Container;

use App\Kernel\HTTP\Request\Request;
use App\Kernel\Router\Router;
use App\Kernel\View\View;

class Container {
    public Request $request;
    
    public Router $router;

    public View $view;
    
    public function __construct() {
        $this->registerServices();
    }
    
    public function registerServices(): void {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->router = new Router($this->view);
    }
}