<?php

require 'vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    require 'routes.php';
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$basePath = '/trabEstagios'; 
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo 'Página não encontrada!';
        break;
        
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            http_response_code(405);
            echo 'Método não permitido!';
            break;
            
            case FastRoute\Dispatcher::FOUND:
                list($controller, $method) = explode('@', $routeInfo[1]);
                $controllerClass = "Controller\\{$controller}"; 
                $controllerFile = "./controllers/{$controller}.php";
                
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    
                    if (class_exists($controllerClass)) {
                        $instance = new $controllerClass();
                        
                        if (method_exists($instance, $method)) {
                        call_user_func_array([$instance, $method], $routeInfo[2]);
                    } else {
                        echo "Método {$method} não encontrado no controlador {$controller}.";
                    }
                } else {
                    echo "Classe {$controllerClass} não encontrada.";
                }
            } else {
                echo "Controlador {$controller} não encontrado.";
            }
            break;
        
}
