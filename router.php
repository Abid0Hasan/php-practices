<?php

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $routes = [
        '/' => 'controllers/index.php',
        '/about' => 'controllers/about.php',
        '/contact' => 'controllers/contact.php',
        '/our-mission' => 'controllers/our-mission.php',
    ];

    function abort($code=404)
    {
        http_response_code($code);
        require 'views/404.php';
        die();
    }

    

    function routeToController($uri, $routes){
        if(array_key_exists($uri, $routes)) {
            require $routes[$uri];
        }else {
            abort();
        }
    }

    routeToController($uri, $routes);