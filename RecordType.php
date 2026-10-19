<?php

declare(strict_types=1);

namespace Balpom\Types;

/*
 * Record is an array, filled "key-value" pairs.
 * where and "key", and "value" is a scalar values.
 *
 * As sample, ["field1"=>"value1", "field2"=>"value2", ... ]
 */
class RecordType extends AbstractType
{
    protected array $enabledTypes = ['array'];

    public function isValid(mixed $value = null): bool
    {
        return $this->isRecord($value);
    }

    protected function coerce(mixed $value): mixed
    {
        $result = [];
        $string = new StringType();
        foreach ($value as $field => $fieldValue) {
            $result[$string->value($field)] = $string->value($fieldValue);
        }

        return $result;
    }

    protected function checkType(mixed $value): void
    {
        if (!$this->isRecord($value)) {
            throw new TypeException('Given value is not a Record.');
        }
    }

    private function isRecord(mixed $value): bool
    {
        if (!$this->isEnabledType($value)) {
            return false;
        }

        foreach ($value as $field => $fieldValue) {
            if (!is_scalar($field) || !is_scalar($fieldValue)) {
                return false;
            }
        }

        return true;
    }

}