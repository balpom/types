<?php

declare(strict_types=1);

namespace Balpom\Types;

use \Stringable;

class StringOrIntType extends AbstractType
{
    protected array $enabledTypes = [Stringable::class, 'string', 'integer', 'int', 'float', 'double'];

    protected function coerce(mixed $value): mixed
    {
        if (is_string($value)) {
            return $value;
        }
        if (is_int($value)) {
            return $value;
        }

        return (string) $value;
    }

}