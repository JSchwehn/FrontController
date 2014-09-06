<?php
namespace FrontController {
    class HttpRouter implements Router
    {

        protected $routes = array();
        private $routeFound = false;
        private $activeRoute = null;

        public function __construct(array $routes = array())
        {
            $this->setRoutes($routes);
        }

        public function getRoutes()
        {
            return $this->routes;
        }

        public function setRoutes(array $routes)
        {
            $this->routes = $routes;
        }

        public function addRoutes(array $routes)
        {
            foreach ($routes as $route) {
                $this->addRoute($route);
            }

            return $this;
        }

        public function addRoute(Route $route)
        {
            // assure that there is only one unique route
            $this->routes[$this->buildRouteKey($route)] = $route;
        }

        protected function buildRouteKey($route)
        {
            // this can be much more elaborated than this, eg. be aware of a
            // secure route, request type, session state ...
            // Remember that in the end you have to find one unique route that can be dispatched
            return $route;
        }

        public function route(Request $request, Response $response)
        {
            /** @var Route $route */
            foreach ($this->routes as $route) {
                if ($route->match($request)) {
                    // now we know which controller should be dispatched
                    // in the dispatch process we have to see if we can
                    $this->setRouteFound(true);
                    $this->activeRoute = $route;
                    break;
                }
            }
            if($this->isRouteFound()) {
                return $this->activeRoute;
            }

            throw new \OutOfBoundsException("Route not found: ".$request->getUri()." known routes are: ".print_r($this->routes,true));
        }

        /**
         * @return boolean
         */
        public function isRouteFound()
        {
            return $this->routeFound;
        }

        /**
         * @param boolean $routeFound
         * @return $this
         */
        public function setRouteFound($routeFound)
        {
            $this->routeFound = $routeFound;

            return $this;
        }

        /**
         * @return null
         */
        public function getActiveRoute()
        {
            return $this->activeRoute;
        }

        /**
         * @param null $activeRoute
         * @return $this
         */
        public function setActiveRoute($activeRoute)
        {
            $this->activeRoute = $activeRoute;

            return $this;
        }
    }
}