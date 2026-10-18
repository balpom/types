<?php

namespace Balpom\Types;

ini_set('max_execution_time', '15');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', 'off');
error_reporting(E_ALL);

include dirname(__DIR__) . '/vendor/autoload.php';

$string = new StringType();

echo $string->value('3.1415926535') . PHP_EOL;
echo gettype($string->value('3.1415926535')) . PHP_EOL;
echo $string->value(3.1415926535) . PHP_EOL;
echo gettype($string->value(3.1415926535)) . PHP_EOL;

echo PHP_EOL . '1 ------------------------------------------' . PHP_EOL . PHP_EOL;

$strictString = new StrictStringType();

echo $strictString->value('3.1415926535') . PHP_EOL;
echo gettype($strictString->value('3.1415926535')) . PHP_EOL;
try {
    echo $strictString->value(3.1415926535) . PHP_EOL;
    echo gettype($strictString->value(3.1415926535)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '2 ------------------------------------------' . PHP_EOL . PHP_EOL;

$int = new IntType();

echo $int->value(7777777) . PHP_EOL;
echo gettype($int->value(7777777)) . PHP_EOL;
echo $int->value('7777777') . PHP_EOL;
echo gettype($int->value('7777777')) . PHP_EOL;
echo $int->value(0000000) . PHP_EOL;
echo gettype($int->value(0000000)) . PHP_EOL;
echo $int->value('+0000000') . PHP_EOL;
echo gettype($int->value('+0000000')) . PHP_EOL;
echo $int->value('-0000000') . PHP_EOL;
echo gettype($int->value('-0000000')) . PHP_EOL;
try {
    echo $int->value('') . PHP_EOL;
    echo gettype($int->value('')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $int->value(true) . PHP_EOL;
    echo gettype($int->value(true)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '3 ------------------------------------------' . PHP_EOL . PHP_EOL;

$strictInt = new StrictIntType();

echo $strictInt->value(-55555) . PHP_EOL;
echo gettype($strictInt->value(-55555)) . PHP_EOL;
echo $strictInt->value(0) . PHP_EOL;
echo gettype($strictInt->value(0)) . PHP_EOL;
echo $strictInt->value(-0) . PHP_EOL;
echo gettype($strictInt->value(-0)) . PHP_EOL;
echo $strictInt->value(+000) . PHP_EOL;
echo gettype($strictInt->value(+000)) . PHP_EOL;
try {
    echo $strictInt->value(true) . PHP_EOL;
    echo gettype($strictInt->value(true)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $strictInt->value(3.1415926535) . PHP_EOL;
    echo gettype($strictInt->value(3.1415926535)) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    echo $strictInt->value('3.1415926535') . PHP_EOL;
    echo gettype($strictInt->value('3.1415926535')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '4 ------------------------------------------' . PHP_EOL . PHP_EOL;

$numeric = new NumericType();

echo $numeric->value(3.1415926535) . PHP_EOL;
echo gettype($numeric->value(3.1415926535)) . PHP_EOL;
echo $numeric->value('3.1415926535') . PHP_EOL;
echo gettype($numeric->value('3.1415926535')) . PHP_EOL;
echo $numeric->value(0000000) . PHP_EOL;
echo gettype($numeric->value(-0000000)) . PHP_EOL;
echo $numeric->value('-0.000000') . PHP_EOL;
echo gettype($numeric->value('-0.000000')) . PHP_EOL;
try {
    echo $numeric->value('pi = 3.1415926535') . PHP_EOL;
    echo gettype($numeric->value('pi = 3.1415926535')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . '5 ------------------------------------------' . PHP_EOL . PHP_EOL;

$strictArray = new StrictArrayType();

print_r($strictArray->value([]));
echo gettype($strictArray->value([])) . PHP_EOL;
try {
    print_r($strictArray->value('abcdef'));
    echo PHP_EOL;
    echo gettype($strictArray->value('abcdef')) . PHP_EOL;
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}

$mixed = new MixedType();

print_r($mixed->value(new \StdClass()));
echo gettype($mixed->value(new \StdClass())) . PHP_EOL;

echo PHP_EOL . '6 ------------------------------------------' . PHP_EOL . PHP_EOL;

$record = new RecordType();
print_r($record->value(["field1" => "value1", "field2" => 3.1415926535, 3 => -0.000000, '3.1415926535' => 000000000]));

try {
    print_r($record->value(["field1" => "value1", "field2" => new \StdClass()]));
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
try {
    print_r($record->value(['field1' => [1, 2, 3], 'field2' => 'value2']));
} catch (TypeException $e) {
    echo 'EXCEPTION: ' . $e->getMessage() . PHP_EOL;
}
