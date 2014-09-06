<?php
namespace FrontController {
    interface Router
    {
        public function addRoute(Route $route);

        public function setRoutes(array $routes);

        public function getRoutes();

        public function addRoutes(array $routes);

        public function route(Request $request, Response $response);


    }
}