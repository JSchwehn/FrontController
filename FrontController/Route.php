<?php
namespace FrontController {
    interface Route {
        public function match(Request $request);
        public function __construct($path, $controllerClass="indexController", $action="index");
        /**
         * @return null|string
         */
        public function getController();

        /**
         * @param null|string $controller
         * @return $this
         */
        public function setController($controller);

        /**
         * @return null|string
         */
        public function getAction();

        /**
         * @param null|string $action
         * @return $this
         */
        public function setAction($action);

        /**
         * @return null
         */
        public function getPath();

        /**
         * @param null $path
         * @return $this
         */
        public function setPath($path);
    }
}