<?php
namespace FrontController\Controllers;
class IndexController
{
    /**
     * @var \FrontController\HttpRequest
     */
    protected $request = null;
    /**
     * @var \FrontController\HttpResponse
     */
    protected $response = null;

    public function __construct(\FrontController\HttpRequest $request, \FrontController\HttpResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static function getInstance($request, $response)
    {
        return new IndexController($request, $response);
    }

    public function index()
    {
        $this->response->addBody("Hello world");
    }

    public function foo() {
        $this->response->addBody('FOOBAR');
    }
}