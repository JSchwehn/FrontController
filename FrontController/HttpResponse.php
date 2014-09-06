<?php
namespace FrontController {
    class HttpResponse implements Response
    {
        protected $version = 'HTTP/1.0';
        protected $headers = array();
        protected $state = "200 OK";
        protected $body = array();

        public function __construct(array $headers=array(), $body = "", $state = "200 OK", $version = "HTTP/1.0")
        {
            $this->setHeaders($headers)
                ->setBody($body)
                ->setState($state)
                ->setVersion($version);
        }

        public function addHeader($name, $header)
        {
            $this->headers[$name] = $header;
        }

        public function send()
        {
            header($this->version . ' ' . $this->state);
            foreach ($this->getHeaders() as $headerField=>$headerValue) {
                header($headerField.' '.$headerValue);
            }
            echo $this->body;
        }

        public function getHeaders()
        {
            return $this->headers;
        }

        public function setHeaders(array $headers)
        {
            $this->headers = $headers;

            return $this;
        }

        /**
         * @return string
         */
        public function getVersion()
        {
            return $this->version;
        }

        /**
         * @param string $version
         * @return $this
         */
        public function setVersion($version)
        {
            $this->version = $version;

            return $this;
        }

        /**
         * @return array
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param array $body
         * @return HttpResponse $this
         */
        public function setBody($body)
        {
            $this->body = $body;

            return $this;
        }

        /**
         * @param $body
         * @return $this
         */
        public function addBody($body)
        {
            $this->body .= $body;

            return $this;
        }

        /**
         * @return string
         */
        public function getState()
        {
            return $this->state;
        }

        /**
         * @param string $state
         * @return $this
         */
        public function setState($state)
        {
            $this->state = $state;

            return $this;
        }

    }
}