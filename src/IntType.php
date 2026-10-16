<?php

declare(strict_types=1);

namespace Balpom\Types;

class IntType extends AbstractType
{
    protected array $enabledTypes = ['string', 'int'];

    /*
     * Coerce type.
     */
    public function coerce(mixed $value): mixed
    {
        if (is_int($value)) {
            return $value;
        }

        if (is_string($value)) {
            $value = trim($value);
            $sign = 1;
            if (1 < strlen($value)) {
                $first = substr($value, 0, 1);
                if (in_array($first, ['-', '+'])) {
                    if ('-' === $first) {
                        $sign = -1;
                    } else {
                        $sign = 1;
                    }
                    $value = substr($value, 1);
                }
            }
            if (preg_match('/^[0-9]+$/', $value)) {
                $value = (int) $value;
                $value = $sign * $value;
            } else {
                $class = get_class($this);
                throw new TypeException('Unable to coerce type in ' . $class . ' for given value.');
            }
        } else {
            $this->check($value);
        }

        return $value;
    }

}