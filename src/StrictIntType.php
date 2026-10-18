<?php

declare(strict_types=1);

namespace Balpom\Types;

class StrictIntType extends AbstractType
{
    protected array $enabledTypes = ['integer', 'int'];

}