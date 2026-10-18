<?php

declare(strict_types=1);

namespace Balpom\Types;

class IntType extends AbstractType
{
    protected array $enabledTypes = [Stringable::class, 'string', 'integer', 'int'];

    protected function coerce(mixed $value): mixed
    {
        if (is_int($value)) {
            return $value;
        }

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
            throw new TypeException('Unable to coerce STRING to INTEGER for given string value.');
        }

        return $value;
    }

}