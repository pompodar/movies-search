<?php
namespace App\Kernel\HTTP\Request;

class Request {
    private array $get;
    private array $post;
    private array $server;
    private array $files;
    private array $cookies;
    
    
    public function __construct($get, $post, $server, $files, $cookies) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
        $this->cookies = $cookies;
    } 

    // ala fabric method
    public static function createFromGlobals(): self {
        return new self(
            $_GET,
            $_POST,
            $_SERVER,
            $_FILES,
            $_COOKIE,
        );
    }

    public function uri(): string{
        return strtok($this->server['REQUEST_URI'], '?');
    } 

    public function method(): string{
        return $this->server['REQUEST_METHOD'];
    } 
}