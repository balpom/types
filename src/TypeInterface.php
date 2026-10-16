<?php

declare(strict_types=1);

namespace Balpom\Types;

interface TypeInterface
{
    /*
     * Get all enabled types.
     */
    public function getTypes(): array;

    /*
     * Check type.
     */
    public function isEnabled(string $type): bool;

    /*
     * Coerce type.
     */
    public function coerce(mixed $value): mixed;

}