<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

/**
 * Class to validate date format
 * 
 * @author chipv.bka@gmail.com
 */
class DateValidator extends BaseValidator {
    /**
     * Check if the date is valid in a specific format passed as options values
     * @param type $value
     * @param type $options
     * @return boolean
     * @throws \Exception
     */
    public static function isValid($value, $options) {

        if (!isset($value) || trim($value) == '') {
            return false;
        }

        if (!isset($options['format'])) {
            throw new \Exception('Option format need to be passed');
        }

        $d = \DateTime::createFromFormat($options['format'], $value);

        if (\DateTime::getLastErrors()['error_count'] > 0) {
            return false;
        }
        return true;
    }

}
