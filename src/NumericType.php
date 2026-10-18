<?php

declare(strict_types=1);

namespace Balpom\Types;

use \Stringable;

class NumericType extends AbstractType
{
    protected array $enabledTypes = [Stringable::class, 'string', 'integer', 'int', 'float', 'double'];

    protected function coerce(mixed $value): mixed
    {
        if (is_int($value) || is_float($value)) {
            return $value;
        }
        if (!is_string($value)) {
            $value = (string) $value;
        };
        if (!is_numeric($value)) {
            throw new TypeException('Given value is not a Numeric.');
        }
        $value = (float) $value;
        if (empty($value)) { // '-0.000000' returns -0 as double PHP type.
            $value = 0;
        }

        return $value;
    }

}