<?php
namespace FrontController {
    class HttpRequest implements Request
    {
        protected $uri = null;
        protected $server = array();
        protected $secure = false;
        protected $params = array();
        protected $post = array();
        protected $files = array();
        protected $cookies = array();
        protected $requestMethod = "";

        /**
         * @param null $uri
         * @param array $params all get parametes $_GET
         * @param array $posts all post data     $_POST
         * @param array $files all submitted files $_FILES
         * @param array $cookies all cookies $_COOKIES
         */
        public function __construct(
            $uri = null,
            array $params = array(),
            array $posts = array(),
            array $files = array(),
            array $cookies = array()
        ) {
            $this->initRequest($uri, $params, $posts, $files, $cookies);
        }

        /**
         * @param null $uri
         * @param array $params all get parametes $_GET
         * @param array $posts all post data     $_POST
         * @param array $files all submitted files $_FILES
         * @param array $cookies all cookies $_COOKIES
         */
        public function initRequest(
            $uri = null,
            array $params = array(),
            array $posts = array(),
            array $files = array(),
            array $cookies = array()
        ) {
            // use the params array to override _SERVER indices.
            $this->server = array_merge($_SERVER, $params);
            $this->params = array_merge($_GET, $params);
            $this->post = array_merge($_POST, $posts);
            $this->files = array_merge($_FILES, $files);
            $this->cookies = array_merge($_COOKIE, $cookies);

            if (empty($uri)) {
                if (!isset($this->params['uri'])) {
                    $this->params['uri'] = "/";
                }
                if(strpos('/',$this->params['uri']) !== 0) {
                    $this->params['uri'] = '/'.$this->params['uri'];
                }
                $uri = $this->params['uri'];
            }
            $this->uri = $uri;
            unset($this->params['uri']);
            if (isset($this->server['HTTPS']) && strtolower($this->server['HTTPS']) != 'off') {
                $this->secure = true;
            }
            $this->requestMethod = $this->server['REQUEST_METHOD'];
        }

        /**
         * @return ResponseInterface
         */
        public static function createFromGlobals()
        {
            return new HttpRequest();
        }

        /**
         * @return array
         */
        public function getCookies()
        {
            return $this->cookies;
        }

        /**
         * @param array $cookies
         * @return $this
         */
        public function setCookies($cookies)
        {
            $this->cookies = $cookies;

            return $this;
        }

        /**
         * @return array
         */
        public function getFiles()
        {
            return $this->files;
        }

        /**
         * @param array $files
         * @return $this
         */
        public function setFiles($files)
        {
            $this->files = $files;

            return $this;
        }

        /**
         * @return array
         */
        public function getParams()
        {
            return $this->params;
        }

        /**
         * @param array $params
         * @return $this
         */
        public function setParams($params)
        {
            $this->params = $params;

            return $this;
        }

        /**
         * @return array
         */
        public function getPost()
        {
            return $this->post;
        }

        /**
         * @param array $post
         * @return $this
         */
        public function setPost($post)
        {
            $this->post = $post;

            return $this;
        }

        /**
         * @return string
         */
        public function getRequestMethod()
        {
            return $this->requestMethod;
        }

        /**
         * @param string $requestMethod
         * @return $this
         */
        public function setRequestMethod($requestMethod)
        {
            $this->requestMethod = $requestMethod;

            return $this;
        }

        /**
         * @return boolean
         */
        public function getSecure()
        {
            return $this->secure;
        }

        /**
         * @param boolean $secure
         * @return $this
         */
        public function setSecure($secure)
        {
            $this->secure = $secure;

            return $this;
        }

        /**
         * @return array
         */
        public function getServer()
        {
            return $this->server;
        }

        /**
         * @param array $server
         * @return $this
         */
        public function setServer($server)
        {
            $this->server = $server;

            return $this;
        }

        /**
         * @return null
         */
        public function getUri()
        {
            return $this->uri;
        }

        /**
         * @param null $uri
         * @return $this
         */
        public function setUri($uri)
        {
            $this->uri = $uri;

            return $this;
        }
    }
}
