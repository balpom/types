<?php

declare(strict_types=1);

namespace Balpom\Types;

interface TypeInterface
{
    /*
     * Return value with coersed type.
     */
    public function value(mixed $value = null): mixed;

    /*
     * Check value.
     */
    public function isValid(mixed $value = null): bool;

}