<?php

namespace App\Domain\Models\Services;

class ConfigModal 
{
    public $routeAction;

    public $routeMethod;

    public $message;

    public function __construct(string $routeAction, string $routeMethod, string $message)
    {   
        $this->routeAction = $routeAction;
        $this->routeMethod = $routeMethod;
        $this->message = $message;
    }
}