<?php

namespace app\components;

use app\components\base\Application as BaseApplication;
use app\components\base\Controller as BaseController;
use app\components\base\ComponentFactory;
use app\components\base\Component;
use app\components\base\ControllerFactory;
use app\components\base\Router as BaseRouter;
use app\components\Router;


/**
 * Here is the backbone of application. On this class every request and response comes.
 * The parent class BaseApplication is a singleton to control de instances in memory.
 * 
 * @author chipv.bka@gmail.com
 */
class Application extends BaseApplication {

    public $name = '';
    public $router;
    public $controller;
    /**
     * Start the application
     */
    public function run() {
        $this->lifeCircle();
    }
    /**
     * It is the lifeCircle of application. Every steps that application will call.
     */
    private function lifeCircle() {
        $this->preInit();
        $this->init();
        $this->bootstrap();
        $this->end();
    }

    /**
     * Load config from the config file /config/app.php
     */
    private function preInit() {
        $this->name = $this->_config['name'];
    }

    /**
     * Init the components and resolve the routes
     */
    private function init() {
        // Init all components
        if (is_array($this->_config['components'])) {
            foreach ($this->_config['components'] as $name => $component) {
                $component = ComponentFactory::create($name, $component);
                $this->setComponent($name, $component)->bootstrap();
            }
        }
        // handle requests and got to route
        $this->resolveRoutes();
    }

    /**
     * Launch the action of controller
     */
    private function bootstrap() {

        $this->controller->callAction($this->router->getActionName());
    }

    /**
     * Finish the application correctly for every component
     */
    public function end() {

        // Initialize all components
        if (is_array($this->_config['components'])) {

            foreach ($this->_config['components'] as $name => $component) {

                $this->$name->close();
            }
        }
    }
    /**
     * Add the component on application instance.
     * @param string $name
     * @param Component $component
     * @return type
     */
    private function setComponent(string $name, Component $component) {
        $this->$name = $component;
        return $this->$name;
    }
    /**
     * Create the router object and add that to the application instance
     * and delegate it to resolve the route of application.
     */
    private function resolveRoutes() {

        $router = new Router($this);
        $this->setRouter($router);
        //create the controller and run action
        $controller = ControllerFactory::create($router->getControllerName());
        $this->setController($controller);
    }
    /**
     * Set the rounter instance on application instance to be delegate on the future.
     * @param BaseRouter $router
     */
    private function setRouter(BaseRouter $router) {

        $this->router = $router;
    }
    /**
     * Set the controller instance on application instance to be delegate on the future.
     * @param BaseController $controller
     */
    private function setController(BaseController $controller) {

        $this->controller = $controller;
    }

}
