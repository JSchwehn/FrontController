<?php
namespace FrontController {
    /**
     * Interface Request
     * @package FrontController
     */
    interface Request
    {
        public function initRequest(
            $uri = null,
            array $params = array(),
            array $posts = array(),
            array $files = array(),
            array $cookies = array()
        );
        /**
         * @return Request
         */
        public static function createFromGlobals();
        /**
         * @return array
         */
        public function getCookies();
        /**
         * @param array $cookies
         * @return $this
         */
        public function setCookies($cookies);
        /**
         * @return array
         */
        public function getFiles();
        /**
         * @param array $files
         * @return $this
         */
        public function setFiles($files);
        /**
         * @return array
         */
        public function getParams();
        /**
         * @param array $params
         * @return $this
         */
        public function setParams($params);
        /**
         * @return array
         */
        public function getPost();
        /**
         * @param array $post
         * @return $this
         */
        public function setPost($post);
        /**
         * @return string
         */
        public function getRequestMethod();
        /**
         * @param string $requestMethod
         * @return $this
         */
        public function setRequestMethod($requestMethod);
        /**
         * @return boolean
         */
        public function getSecure();
        /**
         * @param boolean $secure
         * @return $this
         */
        public function setSecure($secure);
        /**
         * @return array
         */
        public function getServer();
        /**
         * @param array $server
         * @return $this
         */
        public function setServer($server);
        /**
         * @return null
         */
        public function getUri();
        /**
         * @param null $uri
         * @return $this
         */
        public function setUri($uri);
    }
}
