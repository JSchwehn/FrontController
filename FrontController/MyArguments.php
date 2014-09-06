<?php

namespace FrontController {
    class MyArguments
    {
        protected $request = null;
        protected $response = null;
        protected $payload = array();

        public function __construct(Request $request, Response $response, $payload = null)
        {
            $this->setPayload($payload)
                ->setRequest($request)
                ->setResponse($response);
        }

        /**
         * @return array
         */
        public function getPayload()
        {
            return $this->payload;
        }

        /**
         * @param array $payload
         * @return $this
         */
        public function setPayload($payload)
        {
            $this->payload = $payload;

            return $this;
        }

        /**
         * @return null
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * @param null $request
         * @return MyArguments
         */
        public function setRequest($request)
        {
            $this->request = $request;

            return $this;
        }

        /**
         * @return null
         */
        public function getResponse()
        {
            return $this->response;
        }

        /**
         * @param null $response
         * @return $this
         */
        public function setResponse($response)
        {
            $this->response = $response;

            return $this;
        }
    }
}