<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

/**
 * Class to Validate email
 * 
 * @author chipv.bka@gmail.com
 */
class EmailValidator extends BaseValidator {
    public static function isValid($value, $options = []) {
        if (!isset($value) || trim($value) == '') {
            return false;
        }
        return (filter_var($value, FILTER_VALIDATE_EMAIL));
    }

}
