<?php
namespace App;

use App\Router\Router;
use App\Request\Request;


class App {
    public function run(): void {
        $router = new Router(); 

        $request = Request::createFromGlobals();
        
        $router->dispatch($request->uri(), $request->method());
    } 
}