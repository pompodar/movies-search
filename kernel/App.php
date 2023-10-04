<?php
namespace App\Kernel;

use App\Kernel\Router\Router;
use App\Kernel\Request\Request;


class App {
    public function run(): void {
        $router = new Router(); 

        $request = Request::createFromGlobals();
        
        $router->dispatch($request->uri(), $request->method());
    } 
}