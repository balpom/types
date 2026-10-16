<?php

declare(strict_types=1);

namespace Balpom\Types;

class StrictArrayType extends AbstractType
{
    protected array $enabledTypes = ['array'];

    /*
     * Coerce type.
     */
    public function coerce(mixed $value): mixed
    {
        $this->check($value);
        return $value;
    }

}