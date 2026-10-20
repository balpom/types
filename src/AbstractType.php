<?php

declare(strict_types=1);

namespace Balpom\Types;

abstract class AbstractType implements TypeInterface
{
    protected array $enabledTypes = []; // Must be overriden in children classes.
    private array $types = [];
    private $value = null;

    public function __construct(mixed $value = null)
    {
        if (isset($this->enabledTypes) && is_array($this->enabledTypes)) {
            foreach ($this->enabledTypes as $type) {
                $type = $this->prepareType($type);
                $this->types[$type] = $type;
            }
        }
        $this->value($value);
    }

    /*
     * Default check value method.
     */
    public function isValid(mixed $value = null): bool
    {
        return $this->isEnabledType($value);
    }

    /*
     * Default coerce type method.
     * Simple return given value.
     */
    protected function coerce(mixed $value): mixed
    {
        return $value;
    }

    /*
     * Return value with coersed type.
     */
    public function value(mixed $value = null): mixed
    {
        if (null !== $value) {
            $this->checkType($value);
            $this->value = $this->coerce($value);
        }

        return $this->value;
    }

    /*
     * Check type.
     */
    protected function checkType(mixed $value): void
    {
        if (!$this->isEnabledType($value)) {
            $class = get_class($this);
            throw new TypeException('For class ' . $class . ' it is not enabled type.');
        }
    }

    protected function isEnabledType(mixed $value): bool
    {
        if (is_object($value)) {
            $type = get_class($value);
            if (!isset($this->types[$type])) {
                $type = gettype($value);
            }
        } else {
            $type = gettype($value);
        }
        $type = $this->prepareType($type);

        return isset($this->types[$type]);
    }

    private function prepareType(string $type): string
    {
        return trim(strtolower($type));
    }

}