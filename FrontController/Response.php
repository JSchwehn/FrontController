<?php
namespace FrontController {
    interface Response {
        public function __construct(array $headers=array(), $body = "", $state = "200 OK", $version = "HTTP/1.0");
        public function addHeader($name, $header);
        public function send();
        public function getHeaders();
        public function setHeaders(array $headers);
        /**
         * @return string
         */
        public function getVersion();
        /**
         * @param string $version
         * @return $this
         */
        public function setVersion($version);
        /**
         * @return array
         */
        public function getBody();
        /**
         * @param array $body
         * @return HttpResponse $this
         */
        public function setBody($body);
        /**
         * @param $body
         * @return $this
         */
        public function addBody($body);
        /**
         * @return string
         */
        public function getState();
        /**
         * @param string $state
         * @return $this
         */
        public function setState($state);
    }
}
