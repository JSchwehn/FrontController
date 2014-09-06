<?php
namespace FrontController {
    interface Dispatcher
    {
        public function dispatch(Route $route, Request $request, Response $response);
    }
}