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

    public function set($method, $uri, $callback)
    {
        $uri = str_replace('/api', '', $uri);
        $uri = rtrim($uri, '/');
        $uri = ltrim($uri, '/');
        $chunks = explode('/', $uri);
        $this->routes[$method][$uri]['callback'] = $callback;
        if(count($chunks) > 1){
            $expression = str_replace(':', '', $chunks[1]);
            $this->routes[$method][$uri]['expression'] = $expression;
        }
        
    }

    /**
     * get description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function get(string $uri, $callback): void
    {
        $this->set('get', $uri, $callback);
    }

    public function put(string $uri, $callback)
    {
        $this->set('put', $uri, $callback);
    }

    public function post(string $uri, $callback)
    {
        $this->set('post', $uri, $callback);
    }

    public function delete(string $uri, $callback)
    {
        $this->set('delete', $uri, $callback);
    }

    /**
     * resolve description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function resolve(): void
    {
        $route = $this->routes[$this->request->method()][$this->request->uriChunks()[0]];
        $callback = $route['callback'];
        $chunks = $this->request->uriChunks();
        Application::$app->controller = new $callback[0]();
        $callback[0] = Application::$app->controller;
        if(is_array($callback)){            
            if(count($chunks) > 1){
                call_user_func($callback, $chunks[1]);
            }else{
                call_user_func($callback);
            }
        }else{
            call_user_func($callback);
        }
    }
}