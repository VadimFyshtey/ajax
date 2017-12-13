<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');

            $tmp = explode('/', $uri);
            $GLOBALS['start_section'] = array_shift($tmp);

            if (strpos($uri, 'index.php') === false) {
                $uri = explode('/', $uri);
                $GLOBALS['start_section'] = array_shift($uri);
                return implode('/', $uri);
            } else {
                $uri = explode('index.php', $uri, 2);
                return trim(array_pop($uri), '/');
            }


        }
    }

    public function run()
    {
        // Получить строку запроса
            $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);


                if ($result != null) {
                    echo $result;
                    break;
                }
            }
        }
    }

}