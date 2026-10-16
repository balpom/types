<?php

declare(strict_types=1);

namespace Balpom\Types;

class StringType extends AbstractType
{
    protected array $enabledTypes = ['string', 'int', 'float', 'double'];

    /*
     * Coerce type.
     */
    public function coerce(mixed $value): mixed
    {
        if (is_string($value)) {
            return $value;
        }
        $this->check($value);

        return (string) $value;
    }

}