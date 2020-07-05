<?php

namespace app\components\base;

/**
 * Abstract Class to be inherited by all validators
 *  
 * @author chipv.bka@gmail.com
 */
abstract class Validator {

    /**
     * Check if the $value is valid
     * @param $value
     * @param $options
     */
    abstract static function isValid($value, $options);
}
