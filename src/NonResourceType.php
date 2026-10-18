<?php

declare(strict_types=1);

namespace Balpom\Types;

class NonResourceType extends AbstractType
{
    protected array $enabledTypes = ['null', 'bool', 'int', 'float', 'double', 'string', 'array', 'object'];

}