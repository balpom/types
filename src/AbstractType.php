<?php

declare(strict_types=1);

namespace Balpom\Types;

abstract class AbstractType implements TypeInterface
{
    private array $types;
    protected array $enabledTypes = []; // Must be overrided in the child classes.

    public function __construct()
    {
        if (isset($this->enabledTypes) && is_array($this->enabledTypes)) {
            foreach ($this->enabledTypes as $type) {
                $type = trim(strtolower($type));
                $this->types[$type] = $type;
            }
        }
    }

    /*
     * Coerce type.
     */
    abstract public function coerce(mixed $value): mixed;

    /*
     * Check type.
     */
    protected function check(mixed $value): void
    {
        $type = gettype($value);
        if (!$this->isEnabled($type)) {
            $class = get_class($this);
            throw new TypeException('For class ' . $class . ' it is not enabled type: ' . $type . '.');
        }
    }

    /*
     * Get all enabled types.
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /*
     * Check type.
     */
    public function isEnabled(string $type): bool
    {
        $type = trim(strtolower($type));
        return isset($this->types[$type]);
    }

}