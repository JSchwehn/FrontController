<?php
namespace FrontController {
    class HttpDispatcher implements Dispatcher
    {
        public function dispatch(Route $route, Request $request, Response $response)
        {
            $controller = __NAMESPACE__.'\Controllers\\'.$route->getController();
            $action = $route->getAction();
            $foo = new $controller($request, $response);
            $foo->$action();
            $response->send();
        }
    }
}