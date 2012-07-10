<?php
/**
 * File containing the FloatValueValidator class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\FieldType\Validator;
use eZ\Publish\Core\FieldType\Validator,
eZ\Publish\API\Repository\Values\Translation\Message,
eZ\Publish\Core\FieldType\Value as BaseValue;

/**
 * Validator to validate ranges in float values.
 *
 * Note that this validator can be limited by limitation on precision when
 * dealing with floating point numbers, and conversions.
 *
 * @property float $minFloatValue Minimum value for float.
 * @property float $maxFloatValue Maximum value for float.
 */
class FloatValueValidator extends Validator
{
    protected $constraints = array(
        'minFloatValue' => false,
        'maxFloatValue' => false
    );

    /**
     * Perform validation on $value.
     *
     * Will return true when all constraints are matched. If one or more
     * constraints fail, the method will return false.
     *
     * When a check against aconstaint has failed, an entry will be added to the
     * $errors array.
     *
     * @param \eZ\Publish\Core\FieldType\Float\Value $value
     * @return bool
     */
    public function validate( BaseValue $value )
    {
        $isValid = true;

        if ( $this->constraints['maxFloatValue'] !== false && $value->value > $this->constraints['maxFloatValue'] )
        {
            $this->errors[] = new Message("The value cannot be higher than %size%.",
                                          array('size' => $this->constraints['maxFloatValue']));
            $isValid = false;
        }

        if ( $this->constraints['minFloatValue'] !== false && $value->value < $this->constraints['minFloatValue'] )
        {
            $this->errors[] = new Message("The value cannot be lower than %size%.",
                                          array('size' => $this->constraints['minFloatValue']));
            $isValid = false;
        }

        return $isValid;
    }
}
