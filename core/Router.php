<?php
namespace App\Core;
/**
 * Class Router
 *
 * @author Daniel Breg
 * @package App\Core
 */
class Router{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * get description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function get(string $uri, $callback)
    {
        $router[$uri] = $callback;
    }

    /**
     * resolve description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function resolve()
    {
        echo 'test';
    }
}