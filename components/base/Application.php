<?php

namespace app\components\base;

/**
 * Example of Singleton
 * http://designpatternsphp.readthedocs.io/en/latest/Creational/Singleton/README.html#
 * 
 * @author chipv.bka@gmail.com
 */
abstract class Application extends Base {

    protected $_config;
    protected static $_app;

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     * @param array $config
     */
    private function __construct($config = []) {

        $this->_config = $config;
        Application::$_app = $this;
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone() {
        
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup() {
        
    }

    static function app() {

        return self::$_app;
    }

    public function getConfig($name) {
        return $this->_config[$name];
    }

    public static function getInstance($config = []) {

        static $instance = null;

        if (null === $instance) {
            //$class = get_class($this);
            //die($class);
            //$instance = new $class();
            $instance = new static($config);
        }

        return $instance;
    }

    abstract public function run();
}
