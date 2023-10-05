<?php
namespace App\Kernel\View;


class View {
    public function page($name) {
        include_once APP_PATH . "/views/pages/$name.php";
    }

    public function run(): void {
        $this->container
        ->router
        ->dispatch($this->container->request->uri(),
        $this->container->request->method());
    } 
}