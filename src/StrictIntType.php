<?php

declare(strict_types=1);

namespace Balpom\Types;

class StrictIntType extends AbstractType
{
    protected array $enabledTypes = ['int'];

    /*
     * Coerce type.
     */
    public function coerce(mixed $value): mixed
    {
        if (is_int($value)) {
            return $value;
        }
        $this->check($value);

        return false;
    }

}