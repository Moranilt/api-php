<?php
namespace App\Core;

/**
 * Class Request
 *
 * @author Daniel Breg
 * @package App\Core
 */
class Request{
    

    /**
     * uri description
     *
     * @param string $arg Param description
     * @return string Return description
     */
    public function uri()
    {
        $parse_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $check_api = explode('/', $parse_url);
        if($check_api[1] !== 'api'){
            header("HTTP/1.1 404 Not Found");
            exit();
        }
        $uri = str_replace('/api', '', $parse_url);
        $uri = rtrim($uri, '/');
        $path = $uri === '' ? '/' : $uri;
        $pos = strpos($path, '?');
        if($pos === false){
            return $path;
        }
        $path = substr($path, 0, $pos);
        return $path;
    }

    /**
     * method description
     *
     * @param string $arg Param description
     * @return string Return description
     */
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * uriChunks description
     *
     * @param string $arg Param description
     * @return array Return description
     */
    public function uriChunks(): array
    {
        $uri = explode('/', $this->uri());
        $uri = array_splice($uri, 1);
        if(count($uri)> 1){
            $uri[0] = $uri[0].'/:id';
        }
        return $uri;
    }
}