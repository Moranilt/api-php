<?php
namespace App\Core;
use App\Core\Request;

/**
 * Class Application
 *
 * @author Daniel Breg
 * @package App\Core
 */
class Application{
    public Router $router;
    public Request $request;
    public $controller;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * run description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function run()
    {
        $this->router->resolve();
    }

    /**
     * setHeaders description
     *
     * @param string $arg Param description
     * @return void Return description
     */
    public function setHeaders(): void
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }
}