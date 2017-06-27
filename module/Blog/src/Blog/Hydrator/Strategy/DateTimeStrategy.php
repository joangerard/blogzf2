<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 10:37 AM
 */

namespace Blog\Hydrator\Strategy;

use DateTime;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class DateTimeStrategy extends DefaultStrategy
{
    /**
     * {@inheritdoc}
     *
     * Convert a string value into a DateTime object
     */
    public function hydrate($value)
    {
        if (is_string($value) && "" === $value) {
            $value = null;
        } elseif (is_string($value)) {
            $value = new DateTime($value);
        }

        return $value;
    }
}