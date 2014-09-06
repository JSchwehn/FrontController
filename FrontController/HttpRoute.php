<?php

namespace FrontController {
    class HttpRoute implements Route
    {
        protected $path = null;
        protected $controller = null;
        protected $action = null;

        public function __construct($path, $controllerClass="indexController", $action="index")
        {
            $this->setController($controllerClass)
                ->setAction($action);
                $this->setPath($path);
        }

        /**
         * @param Request $request
         * @return bool
         */
        public function match(Request $request)
        {
            return ($this->path === $request->getUri());
        }

        /**
         * @return null|string
         */
        public function getController()
        {
            return $this->controller;
        }

        /**
         * @param null|string $controller
         * @return $this
         */
        public function setController($controller)
        {
            $this->controller = $controller;

            return $this;
        }

        /**
         * @return null|string
         */
        public function getAction()
        {
            return $this->action;
        }

        /**
         * @param null|string $action
         * @return $this
         */
        public function setAction($action)
        {
            $this->action = $action;

            return $this;
        }

        /**
         * @return null
         */
        public function getPath()
        {
            return $this->path;
        }

        /**
         * @param null $path
         * @return $this
         */
        public function setPath($path)
        {
            $this->path = $path;

            return $this;
        }

    }
}