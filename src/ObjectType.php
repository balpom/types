<?php

declare(strict_types=1);

namespace Balpom\Types;

class MixedType extends AbstractType
{
    protected array $enabledTypes = ['null', 'bool', 'int', 'float', 'double', 'string', 'array', 'object', 'resource'];

}