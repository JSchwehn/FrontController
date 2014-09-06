<?php

namespace FrontController {
    class Front {
        private $router = null;
        private $dispatcher = null;

        /**
         * @param Router $router
         * @param Dispatcher $dispatcher
         */
        public function __construct(Router $router, Dispatcher $dispatcher)
        {
            $this->dispatcher = $dispatcher;
            $this->router = $router;
        }

        /**
         * @return \FrontController\Dispatcher|null
         */
        public function getDispatcher()
        {
            return $this->dispatcher;
        }

        /**
         * @param \FrontController\Dispatcher|null $dispatcher
         * @return $this
         */
        public function setDispatcher($dispatcher)
        {
            $this->dispatcher = $dispatcher;

            return $this;
        }

        public function run(Request $request, Response $response)
        {
            $route = $this->router->route($request, $response);
            $this->dispatcher->dispatch($route, $request, $response);
        }
    }
}

