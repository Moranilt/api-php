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

    public function __construct()
    {
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
}